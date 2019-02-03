<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class RecipeImg extends Model
{
    use Searchable;

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public static function checkTopRecipeImg($validPictures)
    {
        $return = '';
        if($validPictures !== ""){
            if (isset($validPictures) && $validPictures->count() > 0) {
                $firstImg = collect($validPictures->first()->urls);
                if ($firstImg->firstWhere('name', "index")['url'] !== "") {
                    $return = $firstImg->firstWhere('name', "index")['url'];
                } elseif ($firstImg->firstWhere('name', "normal")['url'] !== "") {
                    $return = $firstImg->firstWhere('name', "normal")['url'];
                }
            }
        }
         else {
            $return = asset("img/cdglogo.png");
        }
        return $return;
    }

    /**
     * @param $recette
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public static function loadRecipePicturesValid($recette)
    {
        $pictures = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->orderBy('created_at', 'asc')->where('validated', '=', 1)->paginate(5);
        $return = self::corePicture($pictures, $recette);
        return $return;
    }

    private static function corePicture($pictures, $recette)
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
                    $url = url("/recipes/" . $recette->id . "/" . intval($picture->user_id) . "/" . strip_tags(clean($picture->image_name)));
                } else {
                    $firstPart = "/recipes/" . $recette->hashid . "/" . intval($picture->user_id) . "/";
                    $url = url($firstPart . strip_tags(clean($picture->image_name)) . '.jpeg');
                    $urlWebp = url($firstPart . "square_" . strip_tags(clean($picture->image_name)) . ".webp");
                    $urlThumb = url($firstPart . "thumb_" . strip_tags(clean($picture->image_name)) . ".jpeg");
                    $urlIndex = url($firstPart . "index_" . strip_tags(clean($picture->image_name)) . ".png");
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




}

