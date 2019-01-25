<?php

namespace App\Http\Controllers;

use App\Jobs\PictureThumbnail;
use App\RecipeImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class PictureController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPictureToRecipe(Request $request)
    {

        $pictureBase = $request->picture;
        $recipeId = $request->recipe;
        $recipeHash = $request->recipehash;
        $userId = $request->user;

        $namePicture = $this->randomName();
        $uploaded = $this->storeCreationPicture($recipeHash, $pictureBase, $userId, $namePicture);

        DB::table('recipe_imgs')->updateOrInsert(
            ['recipe_id' => $recipeId,
                'image_name' => strip_tags(clean($namePicture)),
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


        return response()->json(true);
    }

    /**
     * @param $pictureBase
     * @param $recipeId
     * @param $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFirstPictureRecipe($picturePath, $pictureName, $recipeId, $recipeHashID, $userId)
    {
        $filePath = Storage::get($picturePath);
        $image = base64_encode($filePath);

        $uploaded = $this->storeCreationPicture($recipeHashID, $image, $userId, $pictureName);

        DB::table('recipe_imgs')->updateOrInsert(
            ['recipe_id' => $recipeId,
                'image_name' => strip_tags(clean($pictureName)),
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
                'validated' => 1
            ]);

        Storage::delete($picturePath);
        return response()->json($uploaded);

    }

    public function loadFirstRecipePicture($recette)
    {
        $pictures = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->where('user_id', '=', $recette->id_user)->orderBy('created_at', 'asc')->where('validated', '=', 1)->get();

        $url = '';
        $urlWebp = '';
        $urlThumb = '';
        $urlIndex = '';
        $return = collect();


        if ($pictures !== null) {
            foreach ($pictures as $picture) {
                $pictureDate = Carbon::parse($picture->created_at);
                $changev7 = Carbon::create(2019, 01, 20, 20, 10, 00);
                if ($pictureDate->lessThan($changev7)) {
                    $url = url("/recipes/" . $recette->id . "/" . intval($recette->id_user) . "/" . strip_tags(clean($picture->image_name)));
                } else {
                    $url = url("/recipes/" . $recette->hashid . "/" . intval($recette->id_user) . "/" . strip_tags(clean($picture->image_name)) . '.jpeg');
                    $urlWebp = url("/recipes/" . $recette->hashid . "/" . intval($recette->id_user) . "/square_" . strip_tags(clean($picture->image_name)) . ".webp");
                    $urlThumb = url("/recipes/" . $recette->hashid . "/" . intval($recette->id_user) . "/thumb_" . strip_tags(clean($picture->image_name)) . ".jpeg");
                    $urlIndex = url("/recipes/" . $recette->hashid . "/" . intval($recette->id_user) . "/index_" . strip_tags(clean($picture->image_name)) . ".png");
                }
                $data = [['name' => 'normal', 'url' => $url, 'user' => intval($recette->id_user)], ['name' => 'webp', 'url' => $urlWebp, 'user' => intval($recette->id_user)], ['name' => 'thumb', 'url' => $urlThumb, 'user' => intval($recette->id_user)], ['name' => 'index', 'url' => $urlIndex, 'user' => intval($recette->id_user)]];
                $return->push($data);
            }
        } else {
            $return->push(['name' => 'normal', 'url' => $url, 'user' => intval($recette->id_user)]);
        }

        return $return;
    }

    static function load_img($recette)
    {
        $controller = new RecipesController();
        return $controller->load_picture($recette);
    }


    /**
     * @param $image
     * @return string
     */
    private function randomName()
    {
        $imageName = str_random(10);
        return $imageName;
    }

    /**
     * @param $recipeHashID
     * @param $imageContent
     * @param $userId
     * @param $imageName
     */
    private function storeCreationPicture($recipeHashID, $imageContent, $userId, $imageName)
    {
        $thumb = PictureThumbnail::dispatch($recipeHashID, $imageContent, $imageName, $userId, 'thumbnail');
        $index = PictureThumbnail::dispatch($recipeHashID, $imageContent, $imageName, $userId, 'indexRecipe');
        $square = PictureThumbnail::dispatch($recipeHashID, $imageContent, $imageName, $userId, 'thumbSquare', 250);
        $original = PictureThumbnail::dispatch($recipeHashID, $imageContent, $imageName, $userId, 'original');
    }
}
