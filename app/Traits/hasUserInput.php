<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 22:30
 */

namespace App\Traits;


trait hasUserInput
{
    public function cleanInput($text){
        return clean(app('profanityFilter')->filter($text));
    }

}