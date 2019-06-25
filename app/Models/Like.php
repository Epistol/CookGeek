<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = ['user_id'];
    public function recipes()
    {
        return $this->morphedByMany(
            Recipe::class,
            'likeable'
        );
    }
}
