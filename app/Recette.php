<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recette extends Model
{
	use Searchable;

    public function verify_time($time){
        if (empty($time) || !isset($time) || $time == NULL ) {
            return  0;
        }

        else {
            return $time;
        }
    }

}

