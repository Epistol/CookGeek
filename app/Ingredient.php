<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    // Un ingrédient ne peut appartenir qu'a une recette
    // Une recette peut avoir plusieurs ingrédients

    public function recipes()
    {
        return $this->morphedByMany('App\Recipe', 'ingredientable');
    }

    public function quantities()
    {
        return $this->hasMany('App\RecipeIngredient');
    }

    public static function name($id)
    {
        return self::where('id', $id)->first()->name;
    }

    public static function getbyName($id)
    {
        return self::where('name', $id)->first();
    }

    public function setNameAttribute($value)
    {
        $value = app('profanityFilter')->filter($value);
        $this->attributes['name'] = strip_tags(clean($value));
    }
}
