<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Type_recipe;
use PHPUnit\Util\Type;

class Recipe_img extends Model
{
    use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }







}

