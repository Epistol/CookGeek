<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Scout\Searchable;

/**
 * Class Ingredient
 * @package App
 */
class Ingredient extends Model
{
    use Searchable;
    /**
     * @var array
     */
    protected $fillable = ['name'];

    // Une recette peut avoir plusieurs ingrédients

    /**
     * @param $id
     *
     * @return mixed
     */
    public static function name($id)
    {
        return self::where('id', $id)->first()->name;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public static function getbyName($id)
    {
        return self::where('name', $id)->first();
    }

    /**
     * @return MorphToMany
     */
    public function recipes()
    {
        return $this->morphedByMany('App\Recipe', 'ingredientable');
    }


    /**
     * @param $value
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return cleanInput($value);
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $value = app('profanityFilter')->filter($value);
        $this->attributes['name'] = strip_tags($value);
    }
}
