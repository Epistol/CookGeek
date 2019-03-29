<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likeable()
    {
        return $this->morphToMany('App\Like', 'likeable');
    }
}
