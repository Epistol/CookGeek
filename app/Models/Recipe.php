<?php

namespace App;

use App\Traits\hasTimes;
use App\Traits\hasUniqueID;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Recipe extends Model implements Feedable, HasMedia
{
    use Searchable, hasTimes, hasUniqueID, HasMediaTrait;

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
}
