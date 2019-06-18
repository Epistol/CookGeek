<?php

namespace App\Models;

use App\Traits\HasLikes;
use Plank\Mediable\Media as BaseMedia;

class Media extends BaseMedia
{
    use HasLikes;
}
