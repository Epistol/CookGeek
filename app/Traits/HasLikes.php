<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 21:34
 */

namespace App\Traits;

use App\Like;

trait HasLikes
{
    /**
     * Get all of the tags for the post.
     */
    public function likes()
    {
        return $this->morphToMany(
            Like::class,
            'likeable'
        );
    }
}
