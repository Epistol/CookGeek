<?php

namespace App\Models;

use App\Traits\HasLikes;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    use HasLikes;

    public function users()
    {
        return $this->morphedByMany(User::class, 'mediable');
    }

}
