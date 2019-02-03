<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public static function name($id)
    {
        return Ingredient::where('id', $id)->first()->name;
    }

    public static function getbyName($id)
    {
        return Ingredient::where('name', $id)->first();
    }

}
