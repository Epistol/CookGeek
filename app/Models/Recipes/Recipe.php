<?php

namespace App;

use App\Jobs\CheckPicture;
use App\Jobs\CheckPictureStep;
use App\Traits\HasLikes;
use App\Traits\HasMediaCDG;
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

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Image\Exceptions\InvalidManipulation;

use Spatie\Image\Manipulations;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Spatie\MediaLibrary\Models\Media;
use Throwable;

/**
 * Class Recipe
 * @package App
 */
class Recipe extends Model implements Feedable, HasMedia
{
    use Searchable, HasTimes, HasUniqueID, HasMediaTrait, HasUserInput, HasLikes, HasMediaCDG;

    /**
     * @return Collection
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
        return self::validated($valid)->signaled($signal)->paginate(intval($nbPaginate));
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
        return self::validated($valid)->signaled($signal)->latest()->paginate(intval($nbPaginate));
    }

    /** Possède plusieurs univers
     * @return MorphToMany
     */
    public function universes()
    {
        return $this->morphToMany(Univers::class, 'universable');
    }

    /** Possède plusieurs notes
     */
    public function notes()
    {
        return $this->hasMany(RecipeNote::class, 'recipe_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * @return MorphToMany
     */
    public function steps()
    {
        return $this->morphToMany(RecipesSteps::class, 'stepable')
            ->withPivot('step_number');
    }

    /**
     * @return MorphToMany
     */
    public function ingredients()
    {
        return $this->morphToMany(Ingredient::class, 'ingredientable')
            ->withPivot('quantity');
    }

    //__________
    // INSERTS
    //__________

    /**
     * @param $request
     * @param bool $first / Is it first picture ?
     * @param null $base
     * @return Media
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\InvalidBase64Data
     */
    public function insertPicture($request, $first = false, $base = null)
    {
        $picture = isset($request->resume) ? $request->resume : null;
        if ($picture !== null) {
            if ($base) {
                if ($base === true) {
                    $media = $this->addMediaFromBase64($picture)
                        ->withCustomProperties(['first_picture' => $first, 'checked' => false])
                        ->withResponsiveImages()
                        ->toMediaCollection();
                }
            } else {
                $media = $this->addMedia($picture)
                    ->withCustomProperties(['first_picture' => $first, 'checked' => false])
                    ->withResponsiveImages()
                    ->toMediaCollection();
            }

            // always attach media to user and recipe
            // todo : if first : order 0; else : increment
            $this->medias()->attach([$media->id]);
            Auth::user()->medias()->attach([$media->id]);
            // then check if recipe is publishable, if not detach and delete
            CheckPicture::dispatch($media, $this);
            return $media;
        }
    }

    /**
     * @param $element
     * @return string|null |null
     */
    public function getAuthorElement($element)
    {
        $userElement = User::where('id', $this->id_user)->select($element)->first();
        if ($userElement) {
            if ($element == 'img') {
                return $userElement->img !== "users/default.png" && $userElement->img !== ""
                && $userElement->img !== null ? $userElement->avatarUser : null;
            } else {
                return $userElement->$element;
            }
        } else {
            return null;
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
        return (new TypeRecipe())->getnamefromid($this->type);
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
    public function insertSteps($request, $base = null)
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

            foreach ($request->step->picture as $picture) {
                if ($picture !== null) {
                    if ($base) {
                        if ($base === true) {
                            $media = $this->addMediaFromBase64($picture)
                                ->withCustomProperties(['checked' => false])
                                ->withResponsiveImages()
                                ->toMediaCollection();
                        }
                    } else {
                        $media = $this->addMedia($picture)
                            ->withCustomProperties(['checked' => false])
                            ->withResponsiveImages()
                            ->toMediaCollection();
                    }

                    // always attach media to user and recipe
                    // todo : if first : order 0; else : increment
                    $newStep->medias()->attach([$media->id]);
                    Auth::user()->medias()->attach([$media->id]);
                    // then check if recipe is publishable, if not detach and delete
                    CheckPictureStep::dispatch($media, $step);
                }
            }

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
            $total += $relatedUniverse->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $this->id)
                ->where('id_user', $this->id_user)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total += $relatedSameAuthor->count();
        }

        if ($total < $nbWanted) {
            $relatedSameAuthor = Recipe::where('validated', 1)
                ->where('id', '!=', $this->id)
                ->inRandomOrder()->limit($nbWanted - $total)
                ->get();
            $related = $related->merge($relatedSameAuthor);
            $total += $relatedSameAuthor->count();
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

    //__________
    // PICTURE GETTERS
    //__________

    /**
     * @param Media|null $media
     *
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(?Media $media = null)
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

    public function getBestPicture($valid = false)
    {
        $bestPicture = collect([]);

        if ($valid == true) {
            $countSet = $this->medias()->wherePivot('valid', true)->count();
        } else {
            $countSet = $this->medias()->count();
        }

        if ($countSet > 0) {
            if ($valid === true) {
                $pictureSet = $this->medias()->wherePivot('valid', true)->get();
            } else {
                $pictureSet = $this->medias()->get();
            }

            $likedMedias = collect([]);
            foreach ($pictureSet as $media) {
                // get the medias that got likes
                if ($media->likes()->count() > 0) {
                    $likedMedias->push(['media' => $media, 'count' => $media->likes()->count()]);
                }
            }

            if ($likedMedias->isNotEmpty()) {
                // get the media who got more likes
                // TODO check that
                dd($likedMedias->max('count'));
            // ?maybe a little shuffle to not always get same picture
            } else {
                // if no like, always return first picture
                $bestPicture->push($this->medias()->first());
//                return $this->getFirstMedia();
            }
        }

        return $bestPicture;
    }

    /**
     * @return int
     */
    public function getTotalTimeHoursAttribute()
    {
        $somme_t = $this->prep_time + $this->cook_time + $this->rest_time;
        return intval($somme_t / 60);
    }

    /**
     * @return int
     */
    public function getTotalTimeMinutesAttribute()
    {
        $somme_t = $this->prep_time + $this->cook_time + $this->rest_time;
        $somme_h =  $somme_t / 60;
        return intval($somme_t - ((int)$somme_h * 60));
    }


    public function getTimeFormatAttribute()
    {
        $somme_t = $this->prep_time + $this->cook_time + $this->rest_time;

        $format = '%1$02d';
        // si il y'a + d'1heure
        if ($somme_t > 60) {
            $somme_h = $somme_t / 60;
            $somme_m = $somme_t - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on les affiches
            if ($somme_m > 0) {
                return sprintf($format, $somme_h) . ' h ' . sprintf($format, $somme_m);
            } else {
                return sprintf($format, $somme_h) . ' h ';
            }
        } else {
            $somme_h = 0;
            $somme_m = $somme_t - ((int)$somme_h * 60);
            // si le nb de minute est supérieur a 0, on affiche qqch
            if ($somme_m > 0) {
                return sprintf($format, $somme_m) . ' min';
            } else {
                return '';
            }
        }
    }

    /**
     * @param null $valid
     * @param null $skip
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getAuthorPictures($valid = null, $skip = null)
    {
        $picturesOfAuthor = collect([]);
        $pictureSetCount = $this->medias()->count();
        if ($pictureSetCount > 0) {
            if ($valid) {
                $pictureSet = $this->medias()->wherePivot('valid', $valid)->get();
            } else {
                $pictureSet = $this->medias()->get();
            }
            if ($skip) {
                $pictureSet = $pictureSet->splice($skip);
            }
            $picturesOfAuthor = $pictureSet->filter(function ($value) {
                // if the user still exist, otherwise we don't show his pictures
                if ($value->users()->count() > 0) {
                    if ($value->users()->first()->id === $this->id_user) {
                        return $value;
                    }
                }
            });
        }
        return $picturesOfAuthor;
    }

    /**
     * @param null $valid
     * @param null $skip
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getNonAuthorPictures($valid = null, $skip = null)
    {
        $picturesOfAuthor = collect([]);
        $pictureSetCount = $this->medias()->count();
        if ($pictureSetCount > 0) {
            if ($valid) {
                $pictureSet = $this->medias()->wherePivot('valid', true)->get();
            } else {
                $pictureSet = $this->medias()->wherePivot('valid', false)->get();
            }
            if ($skip) {
                $pictureSet = $pictureSet->splice($skip);
            }
            $picturesOfAuthor = $pictureSet->filter(function ($value) {
                // if the user still exist, otherwise we don't show his pictures
                if ($value->users()->count() > 0) {
                    if ($value->users()->first()->id !== $this->id_user) {
                        return $value;
                    }
                }
            });
        }
        return $picturesOfAuthor;
    }
}
