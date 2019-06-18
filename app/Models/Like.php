<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function recipes()
    {
        return $this->morphedByMany(
            Recipe::class,
            'likeable'
        );
    }
}
