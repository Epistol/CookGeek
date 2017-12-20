<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model
{
    public function explode_star($value){
        $stars = DB::table('recipe_likes')->where('id_recipe', '=', $value)->avg('note');
        $stars1 = number_format($stars, 1, '.', '');
        $starsget =  explode('.', $stars1, 2);
        return $starsget;
    }
}
