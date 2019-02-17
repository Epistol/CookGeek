<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Recipe extends Model implements Feedable
{
    use Searchable;

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }


    /**
     * @param $value
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
        return (new Type_recipe)->getnamefromid($mytypeid);
    }

    /**
     * @return string
     */
    public function getTypeLower()
    {
        $mytypeid = $this->type;
        $typename = (new Type_recipe)->getnamefromid($mytypeid);
        return strtolower($typename);
    }

    /**
     * @param $time
     * @return int
     */
    public static function verify_time($time)
    {
        if (empty($time) || !isset($time) || $time == NULL) {
            return 0;
        } else {
            return intval($time);
        }
    }

    /**
     * @param $t_h
     * @param $time
     * @return float|int
     */
    public static function return_time($t_h, $time){
        if($t_h === null){
            $t_h = 0;
        }
        if($time === null){
            $time = 0;

        }
        return intval(($t_h*60) + $time);
    }


    /**
     * @return $this|array|FeedItem
     */
    public function toFeedItem()
    {
        if ($this->commentary_author == NULL) {
            $contenu = $this->title . ", Pour " . $this->nb_guests . " " . $this->guest_type;
        } else {
            $contenu = $this->commentary_author;
        }
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($contenu)
            ->updated($this->updated_at)
            ->link(url("/") . "/recette/" . $this->slug)
            ->author($this->id_user);
    }

    /** TODO : a dégager
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllFeedItems()
    {
        return Recipe::all();
    }

    /**
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeValidated($query, $value)
    {
        return $query->where('validated', $value);
    }

    public function scopeSignaled($query, $choice)
    {
        if($choice === false){
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
     * @return mixed
     */
    public static function getPaginate($valid, $signal, $nbPaginate = 10){
        $recipes = Recipe::validated($valid)->signaled($signal)->paginate(intval($nbPaginate));
        return $recipes;
    }

    public static function getLastPaginate($valid, $signal, $nbPaginate = 10){
        $recipes = Recipe::validated($valid)->signaled($signal)->latest()->paginate(intval($nbPaginate));
        return $recipes;
    }


    /**
     * @param null $prepMinute
     * @param $cookMinute
     * @param $restMinute
     * @param $prepHeure
     * @param $cookHeure
     * @param $restHeure
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public static function getTimes($prepMinute , $cookMinute, $restMinute, $prepHeure, $cookHeure, $restHeure){
        $datas = collect(['prepM' => $prepMinute, 'cookM' => $cookMinute, 'restM' => $restMinute, 'prepH' => $prepHeure, 'cookH' => $cookHeure, 'restH' => $restHeure]);

        $filtered = $datas->filter(function ($value, $key) {
            if (empty($value) || !isset($value) || $value === NULL) {
                return $key;
            } else {
                return intval($value);
            }
        });

        $prep = self::return_time($filtered->get('prepH'), $filtered->get('prepM'));
        $cook = self::return_time($filtered->get('cookH'), $filtered->get('cookM'));
        $rest = self::return_time($filtered->get('restH'), $filtered->get('restM'));

        $times = collect(['prep' => $prep, 'cook' => $cook, 'rest' => $rest]);
        return $times;
    }


}

