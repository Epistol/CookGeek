<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 22:30
 */

namespace App\Traits;

trait HasUserInput
{
    public function cleanInput($text)
    {
        return strip_tags(app('profanityFilter')->filter($text));
    }
}
