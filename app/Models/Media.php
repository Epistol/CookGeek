<?php

namespace App\Models;

use App\Traits\HasLikes;
use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    use HasLikes;
}
