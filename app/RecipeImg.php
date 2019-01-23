<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class RecipeImg extends Model
{
    use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }







}

