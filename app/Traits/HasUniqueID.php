<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 20:27
 */

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait HasUniqueID
{
    public function generateUid($data)
    {
        return Hashids::encode($data); // Used for encoding
    }
}
