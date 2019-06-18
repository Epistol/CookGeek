<?php

namespace App;

use App\Jobs\CheckPicture;
use App\Traits\HasImages;
use App\Traits\HasLikes;
use App\Traits\HasTimes;
use App\Traits\HasUniqueID;
use App\Traits\HasUserInput;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\MediaUploaderFacade as MediaUploader;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;

use Throwable;

/**
 * Class Recipe
 * @package App
 */
class Recipe extends Model implements Feedable
{
    use Searchable, HasTimes, HasUniqueID, HasUserInput, HasLikes, HasImages;
    use HandlesMediaUploadExceptions;
    /**
     * @return Collection|static[]
     */
    public static function getAllFeedItems()
    {
        return self::all();
    }

    /**
     * @param     $valid
     * @param     $signal
     * @param int $nbPaginate
     *
     * @return mixed
     */
    public static function getPaginate($valid, $signal, $nbPaginate = 10)
    {
        $recipes = self::validated($valid)->signaled($signal)->paginate(intval($nbPaginate));

        return $recipes;
    }

    /**
     * @param     $valid
     * @param     $signal
     * @param int $nbPaginate
     *
     * @return mixed
     */
    public static function getLastPaginate($valid, $signal, $nbPaginate = 10)
    {
        $recipes = self::validated($valid)->signaled($signal)->latest()->paginate(intval($nbPaginate));

        return $recipes;
    }

    /** Possède plusieurs univers
     * @return MorphToMany
     */
    public function universes()
    {
        return $this->morphToMany(Univers::class, 'universable');
    }

    /**
     * @return MorphToMany
     */
    public function steps()
    {
        return $this->morphToMany(RecipesSteps::class, 'stepable')->withPivot('step_number');
    }

    /**
     * @return MorphToMany
     */
    public function ingredients()
    {
        return $this->morphToMany('App\Ingredient', 'ingredientable');
    }

    /**
     * @param $request
     * @param $first / Is it first picture ?
     */
    public function insertPicture($request, $first = false)
    {
        $picture = isset($request->resume) ? $request->resume : null;
        if ($picture !== null) {
            try {
                $media = MediaUploader::fromSource($picture)
                    ->toDestination('public', 'recipes/' . $this->id)
                    ->onDuplicateIncrement()
                    ->upload();

                dd($media->getUrl());

            } catch (MediaUploadException $e) {
                throw $this->transformMediaUploadException($e);
            }
            dd($media);
            /*  $media = $this->addMedia($picture)
                  ->withCustomProperties(['first_picture' => $first, 'checked' => false])
                  ->withResponsiveImages()
                  ->toMediaCollection();*/
            CheckPicture::dispatch($media, $this);
        }
    }

    /**
     * @param Media|null $media
     *
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->format(Manipulations::FORMAT_JPG);

        $this->addMediaConversion('index')
            ->width(300)
            ->height(150)
            ->format(Manipulations::FORMAT_PNG);

        $this->addMediaConversion('thumbSquare')
            ->width(250)
            ->height(250)
            ->format(Manipulations::FORMAT_WEBP);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Media|null
     */
    public function getBestPicture()
    {
        if ($this->getMedia()->count() > 0) {
            $medias = $this->getMedia();
            $likedMedias = collect([]);

            // get the medias that got likes
            foreach ($medias as $media) {
                if ($media->likes) {
                    $likedMedias->push(['media' => $media, 'count' => $media->likes->count()]);
                }
            }

            if ($likedMedias->isNotEmpty()) {
                // get the media who got more likes
                dd($likedMedias->max('count'));
            // ?maybe a little shuffle to not always get same picture
            } else {
                // if no like, always return first picture
                return $this->getFirstMedia();
            }
        } else {
            return response(null);
        }
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return (new TypeRecipe())->getnamefromid($this->type);
    }

    /**
     * @return string
     */
    public function getTypeLower()
    {
        $typename = (new TypeRecipe())->getnamefromid($this->type);

        return strtolower($typename);
    }

    /**
     * @return $this|array|FeedItem
     */
    public function toFeedItem()
    {
        if ($this->commentary_author == null) {
            $contenu = $this->title . ', Pour ' . $this->nb_guests . ' ' . $this->guest_type;
        } else {
            $contenu = $this->commentary_author;
        }

        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($contenu)
            ->updated($this->updated_at)
            ->link(url('/') . '/recette/' . $this->slug)
            ->author($this->id_user);
    }

    /**
     * @param $query
     * @param $value
     *
     * @return mixed
     */
    public function scopeValidated($query, $value)
    {
        return $query->where('validated', $value);
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->validated === 0 ? false : true;
    }

    /**
     * @param $query
     * @param $choice
     *
     * @return mixed
     */
    public function scopeSignaled($query, $choice)
    {
        if ($choice === false) {
            return $query->whereNotIn('id', function ($query) {
                $query->select('recipe_id')
                    ->from('signalements')
                    ->where('status', 1)
                    ->orWhere('created_at', '>=', today()->toDateTimeString());
            });
        }

        return $query;
    }

    /**
     * @param $newSlug
     * @param $uid
     *
     * @return string
     * @throws Throwable
     */
    public function slugUpdate($newSlug, $uid)
    {
        $slug = $this->slugTitle($newSlug, $uid);

        $this->slug = $slug;
        $this->hashid = $uid;
        $this->saveOrFail();
        return $slug;
    }

    /**
     * @param $title
     * @param $uid
     *
     * @return string
     */
    public function slugTitle($title, $uid)
    {
        return Str::slug(strip_tags(clean(app('profanityFilter')->filter($title))) . '-' . $uid, '-');
    }

    /**
     * @param $request
     *
     * @return Recipe
     */
    public function easyInsert($request)
    {
        $this->title = $request->title;
        $this->vegetarien = $request->vegan == 'on' ? true : false;
        $this->difficulty = intval($request->difficulty);
        $this->type = intval($request->categ_plat);
        $this->cost = intval($request->cost);
        $this->prep_time = $this->getUnifiedTime($request->prep_minute, $request->prep_heure);
        $this->cook_time = $this->getUnifiedTime($request->cook_minute, $request->cook_heure);
        $this->rest_time = $this->getUnifiedTime($request->rest_minute, $request->rest_heure);
        $this->nb_guests = $request->unite_part;
        $this->guest_type = $request->value_part;
        $this->type_univers = intval($request->type);
        $this->id_user = Auth::user()->id;
        $this->video = $request->video;
        $this->commentary_author = $request->comment;
        $this->validated = 0;
        $this->lang = Lang::locale();

        return $this;
    }

    /**
     * @param $request
     */
    public function insertSteps($request)
    {
        // Storing steps and attach to the recipe
        foreach ($request->step as $key => $step) {
            $newStep = RecipesSteps::firstOrCreate(
                [
                    'instruction' => $step
                ]
            );
            $this->steps()->attach(
                $newStep,
                ['step_number' => $key + 1]
            );

            /*foreach ($request->step->picture as $picture) {
                if (!empty($picture)) {
                    $newPicture = $newStep->addMedia($picture)->toMediaCollection('main');
                    $newStep->image()->attach($newPicture);
                }
            }*/

            /*$path = $step->photo->store('public/uploads');
            $picture = $this->addMedia($picture)->toMediaCollection('step');
            PictureThumbnail::dispatch($newStep, $path, 'thumbnail');*/
        }
    }


    /**
     * @param $request
     */
    public function insertIngredients($request)
    {
        // Storing ingredients and attach to the recipe
        foreach ($request->ingredient as $key => $ingredient) {
            $ingredient = Ingredient::firstOrCreate(['name' => $ingredient, 'lang' => Lang::locale()]);
            $this->ingredients()->attach(
                $ingredient,
                ['quantity' => $this->cleanInput($request->qtt_ingredient[$key])]
            );
        }
    }


    public function moreLikeThis($nbRecipes)
    {
        $nbWanted = intval($nbRecipes);
        $related = Recipe::where('type', $this->type)
            ->where('id', '!=', $this->id)->where('validated', 1)->inRandomOrder()->limit($nbWanted)
            ->get();
        $total = $related->count();

        // I want to execute theses commands
        if ($total < $nbWanted) {
            $relatedUniverse = Recipe::where('univers', $this->univers)->where('validated', 1)
                ->where('id', '!=', $this->id)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedUniverse);
            $total = $total + $relatedUniverse->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $this->id)
                ->where('id_user', $this->id_user)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total = $total + $relatedSameAuthor->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $this->id)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total = $total + $relatedSameAuthor->count();
        }

        return $related;
    }

    /**
     * @param $val
     * @return string
     */
    public function sumerise($val)
    {
        // si il y'a + d'1heure
        if ($val > 60) {
            $somme_h = $val / 60;
            $somme_m = $val - ((int)$somme_h * 60);
            return $somme_h . "H" . $somme_m . "M";
        } else {
            $somme_h = 0;
            $somme_m = $val - ((int)$somme_h * 60);
            return $somme_m . "M";
        }
    }
}
