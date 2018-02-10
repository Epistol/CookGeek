<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class TypeRecipe extends Model
{
	use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }


    public function getnamefromid($id){
        $type = $this->where('id', $id)->first();
        return "{$type->name}";
    }


}

