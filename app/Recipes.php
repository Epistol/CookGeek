<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Type_recipe;
use PHPUnit\Util\Type;

class Recipes extends Model
{
	use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getType(){
        $mytypeid = $this->type;
        return (new Type_recipe)->getnamefromid($mytypeid);

    }



    public function verify_time($time){
        if (empty($time) || !isset($time) || $time == NULL ) {
            return  0;
        }

        else {
            return $time;
        }
    }

}

