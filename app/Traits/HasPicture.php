<?php
/**
 * Created by PhpStorm.
 * User: epistol
 * Date: 24/02/19
 * Time: 22:30
 */

namespace App\Traits;

use App\Http\Controllers\PictureController;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait HasPicture
{
    public function addFirstPictureRecipe($picturePath, $pictureName, $recipeId, $recipeHashID, $userId)
    {
        $picController = new PictureController();
        try {
            return $picController->addFirstPictureRecipe($picturePath, $pictureName, $recipeId, $recipeHashID, $userId);
        } catch (FileNotFoundException $e) {
            return $e;
        }
    }
}
