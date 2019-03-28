<?php

namespace App;

use App\Jobs\PictureThumbnail;
use App\Traits\HasTimes;
use App\Traits\HasUniqueID;
use App\Traits\HasUserInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Recipe extends Model implements Feedable, HasMedia
{
    use Searchable, HasTimes, HasUniqueID, HasMediaTrait, HasUserInput;

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function ingredients()
    {
        return $this->morphToMany('App\Ingredient', 'ingredientable');
    }

    public function steps()
    {
        return $this->morphToMany('App\RecipesSteps', 'stepable');
    }

    public function universes()
    {
        return $this->morphToMany('App\Univers', 'universable');
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
        $mytypeid = $this->type;

        return (new Type_recipe())->getnamefromid($mytypeid);
    }

    /**
     * @return string
     */
    public function getTypeLower()
    {
        $mytypeid = $this->type;
        $typename = (new Type_recipe())->getnamefromid($mytypeid);

        return strtolower($typename);
    }

    /**
     * @return $this|array|FeedItem
     */
    public function toFeedItem()
    {
        if ($this->commentary_author == null) {
            $contenu = $this->title.', Pour '.$this->nb_guests.' '.$this->guest_type;
        } else {
            $contenu = $this->commentary_author;
        }

        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($contenu)
            ->updated($this->updated_at)
            ->link(url('/').'/recette/'.$this->slug)
            ->author($this->id_user);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllFeedItems()
    {
        return self::all();
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
     * @param $valid
     * @param $signal
     * @param int $nbPaginate
     *
     * @return mixed
     */
    public static function getPaginate($valid, $signal, $nbPaginate = 10)
    {
        $recipes = self::validated($valid)->signaled($signal)->paginate(intval($nbPaginate));

        return $recipes;
    }

    public static function getLastPaginate($valid, $signal, $nbPaginate = 10)
    {
        $recipes = self::validated($valid)->signaled($signal)->latest()->paginate(intval($nbPaginate));

        return $recipes;
    }


    /**
     * @param $title
     * @param $uid
     * @return string
     */
    public function slugTitle($title, $uid)
    {
        return str_slug(strip_tags(clean(app('profanityFilter')->filter($title))) . '-' . $uid, '-');
    }

    /**
     * @param $newSlug
     * @param $uid
     * @throws \Throwable
     */
    public function slugUpdate($newSlug, $uid)
    {
        $slug = $this->slugTitle($newSlug, $uid);
        $this->slug = $slug;
        $this->hashid = $uid;
        $this->saveOrFail();
    }

    /**
     * @param $request
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
                    'instruction' => $request->step[$key]
                ]
            );
            $this->steps()->attach(
                $newStep,
                ['step_number' => $key]
            );
            /*$path = $step->photo->store('public/uploads');
            $picture = $this->addMedia($picture)->toMediaCollection('step');
            PictureThumbnail::dispatch($newStep, $path, 'thumbnail');*/
        }
    }

    public function insertIngredients($request)
    {
        // Storing ingredients and attach to the recipe
        foreach ($request->ingredient as $key => $ingredient) {
            $ingredient = Ingredient::firstOrCreate(['name' => $ingredient]);
            $this->ingredients()->attach(
                $ingredient,
                ['quantity' => $this->cleanInput($request->qtt_ingredient[$key])]
            );
        }
    }

    public function insertPicture($picture, $type)
    {
        if (!empty($picture)) {
            if ($picture->getError() == 0) {
                $picture = $this->addMedia($picture)->toMediaCollection($type);
                PictureThumbnail::dispatch($this, $picture->getUrl(), 'thumbnail');
                PictureThumbnail::dispatch($this, $picture->getUrl(), 'indexRecipe');
                PictureThumbnail::dispatch($this, $picture->getUrl(), 'thumbSquare', 250);
                PictureThumbnail::dispatch($this, $picture->getUrl(), 'original');
            }
        }
    }
}
