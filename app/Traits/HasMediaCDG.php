<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 21:34
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMediaCDG
{
    /**
     * @return mixed
     */
    public function medias()
    {
        return $this->morphToMany(\App\Models\Media::class, 'mediable')->withPivot('valid');
    }
}
