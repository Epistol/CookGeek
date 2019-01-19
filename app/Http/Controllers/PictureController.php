<?php

namespace App\Http\Controllers;

use App\Jobs\PictureThumbnail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class PictureController extends Controller
{
    /**
     * @param Request $request
     */
    public function addPictureToRecipe(Request $request){

        $pictureBase = $request->picture;
        $recipeId = $request->recipe;
        $userId = $request->user;

        $namePicture = $this->randomName($pictureBase);

        $uploaded = $this->storeCreationPicture($recipeId, $pictureBase, $userId, $namePicture);
        return $uploaded;

    }



    /**
     * @param $image
     * @return string
     */
    private function randomName($image){
        // TODO : prendre en compte le nom / contenu de l'image
        $imageName = str_random(10).'.'.'png';
        return $imageName;
    }

    /**
     * @param $recipe
     * @param $imageContent
     * @param $userId
     * @param $imageName
     */
    private function storeCreationPicture($recipe, $imageContent, $userId, $imageName){
        PictureThumbnail::dispatch($recipe, $imageContent, $imageName, $userId,  'thumbnail', 150);
//        PictureThumbnail::dispatch($recipe, $imageContent, $imageName, $userId,  'thumbnail', 250);
    }
}
