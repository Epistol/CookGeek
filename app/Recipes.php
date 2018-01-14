<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Type_recipe;
use PHPUnit\Util\Type;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Recipes extends Model implements Feedable
{
	use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getType(){
        $mytypeid = $this->type;
        return (new Type_recipe)->getnamefromid($mytypeid);
    }

    public function getTypeLower(){
        $mytypeid = $this->type;
        $typename =  (new Type_recipe)->getnamefromid($mytypeid);
        return strtolower($typename);
    }
    public function verify_time($time){
        if (empty($time) || !isset($time) || $time == NULL ) {
            return  0;
        }

        else {
            return $time;
        }
    }

    public function toFeedItem()
    {
        if($this->commentary_author  == NULL){
            $contenu = $this->title . ", Pour ". $this->nb_guests. " " .  $this->guest_type;
        }
        else {
            $contenu = $this->commentary_author ;
        }
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($contenu)
            ->updated($this->updated_at)
            ->link(url("/")."/recette/".$this->slug)
            ->author($this->id_user);
    }

    public static  function getAllFeedItems(){
        return Recipes::all();
    }

}

