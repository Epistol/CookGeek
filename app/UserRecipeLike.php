<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecipeLike extends Model
{

    public $timestamps = false;

    protected $table = 'user_recipe_likes';
    protected $fillable = ['user_id', 'recipe_id'];


    }
