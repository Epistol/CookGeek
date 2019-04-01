<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 21:34
 */

namespace App\Traits;

trait HasPicture
{
    /**
     * Get all of the tags for the post.
     */
    public function pictures()
    {
        return $this->morphToMany('App\Picture', 'pictureable');
    }
}
