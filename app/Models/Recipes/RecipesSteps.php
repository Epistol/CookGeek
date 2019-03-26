<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipesSteps extends Model
{
    public $timestamps = false;
    protected $table = 'recipes_steps';
    protected $fillable = 'instruction';

    public function recipes()
    {
        return $this->morphedByMany('App\Recipe', 'stepable');
    }
}
