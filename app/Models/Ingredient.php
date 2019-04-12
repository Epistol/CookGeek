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

    // Un ingrédient ne peut appartenir qu'a une recette
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
     * @return HasMany
     */
    public function quantities()
    {
        return $this->hasMany('App\RecipeIngredient');
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $value                    = app('profanityFilter')->filter($value);
        $this->attributes['name'] = strip_tags(clean($value));
    }
}
