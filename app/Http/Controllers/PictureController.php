<?php

namespace App\Http\Controllers;

use App\Jobs\PictureThumbnail;
use App\Jobs\UniversThumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * @param Request $request
     *
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
            ['recipe_id'     => $recipeId,
                'image_name' => strip_tags(clean($namePicture)),
                'user_id'    => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return response()->json(true);
    }

    public function addPictureToUniverse(Request $request)
    {
        $universId = $request->anyid;
        $pictureBase = $request->picture;
        $userId = $request->user;
        $namePicture = $this->randomName();
        $this->storeUniversPicture($universId, $pictureBase, $namePicture, $userId);

        return response()->json(true);
    }

    /**
     * @param $pictureBase
     * @param $recipeId
     * @param $userId
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFirstPictureRecipe($picturePath, $pictureName, $recipeId, $recipeHashID, $userId)
    {
        $filePath = Storage::get($picturePath);
        $image = base64_encode($filePath);

        $uploaded = $this->storeCreationPicture($recipeHashID, $image, $userId, $pictureName);

        DB::table('recipe_imgs')->updateOrInsert(
            ['recipe_id'     => $recipeId,
                'image_name' => strip_tags(clean($pictureName)),
                'user_id'    => $userId,
                'created_at' => now(),
                'updated_at' => now(),
                'validated'  => 1,
            ]);

        Storage::delete($picturePath);

        return response()->json($uploaded);
    }

    /**
     * @param $recette
     *
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function loadRecipePicturesValid($recette)
    {
        $pictures = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->orderBy('created_at', 'asc')->where('validated', '=', 1)->paginate(5);
        $return = $this->corePicture($pictures, $recette);

        return $return;
    }

    /**
     * @param $recette
     *
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function loaduserPicturesNonValid($recette, $user)
    {
        $pictures = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->orderBy('created_at', 'asc')->where('validated', '=', 0)->where('user_id', '=', intval($user))->paginate(5);

        $return = $this->corePicture($pictures, $recette);

        return $return;
    }

    /**
     * @param $recette
     *
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function loadMoreRecipePictures($recette)
    {
        $pictures = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->orderBy('created_at', 'asc')->get();

        $url = '';
        $urlWebp = '';
        $urlThumb = '';
        $urlIndex = '';
        $return = collect();

        return $return;
    }

    private function corePicture($pictures, $recette)
    {
        $changev7 = Carbon::create(2019, 01, 20, 20, 10, 00);

        $url = '';
        $urlWebp = '';
        $urlThumb = '';
        $urlIndex = '';

        if ($pictures->isNotEmpty()) {
            foreach ($pictures as $picture) {
                $listLinks = collect();
                $pictureDate = Carbon::parse($picture->created_at);
                if ($pictureDate->lessThan($changev7)) {
                    $url = url('/recipes/'.$recette->id.'/'.intval($picture->user_id).'/'.strip_tags(clean($picture->image_name)));
                } else {
                    $firstPart = '/recipes/'.$recette->hashid.'/'.intval($picture->user_id).'/';
                    $url = url($firstPart.strip_tags(clean($picture->image_name)).'.jpeg');
                    $urlWebp = url($firstPart.'square_'.strip_tags(clean($picture->image_name)).'.webp');
                    $urlThumb = url($firstPart.'thumb_'.strip_tags(clean($picture->image_name)).'.jpeg');
                    $urlIndex = url($firstPart.'index_'.strip_tags(clean($picture->image_name)).'.png');
                }

                $listLinks->push(['name' => 'normal', 'url' => $url]);
                $listLinks->push(['name' => 'webp', 'url' => $urlWebp]);
                $listLinks->push(['name' => 'thumb', 'url' => $urlThumb]);
                $listLinks->push(['name' => 'index', 'url' => $urlIndex]);
                $picture->urls = $listLinks;
            }
        }

        return $pictures;
    }

    /**
     * @param $image
     *
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

    private function storeUniversPicture($universId, $imageContent, $imageName, $userId)
    {
        UniversThumbnail::dispatch($universId, $imageContent, $imageName, $userId, 'thumbnail');
        UniversThumbnail::dispatch($universId, $imageContent, $imageName, $userId, 'indexRecipe');
        UniversThumbnail::dispatch($universId, $imageContent, $imageName, $userId, 'thumbSquare', 250);
        UniversThumbnail::dispatch($universId, $imageContent, $imageName, $userId, 'banner');
        UniversThumbnail::dispatch($universId, $imageContent, $imageName, $userId, 'original');
    }
}
