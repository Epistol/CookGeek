<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 21:34
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasImages
{

    /**
     * @return MorphOne
     */
    public function image()
    {
        return $this->hasMany('App\Image', 'imageable');
    }

}
