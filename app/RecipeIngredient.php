<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $table = 'recipes_ingredients';

    /*public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }*/
}
