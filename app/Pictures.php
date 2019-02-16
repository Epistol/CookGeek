<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class Pictures extends Model
{
    use Searchable;

    /**
     * @param $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @param $validPictures
     * @return string
     */
    public static function checkTopRecipeImg($validPictures)
    {
        $return = '';
        if ($validPictures !== "") {
            if (isset($validPictures) && $validPictures->count() > 0) {
                $firstImg = collect($validPictures->first()->urls);
                if ($firstImg->firstWhere('name', "index")['url'] !== "") {
                    $return = $firstImg->firstWhere('name', "index")['url'];
                } elseif ($firstImg->firstWhere('name', "normal")['url'] !== "") {
                    $return = $firstImg->firstWhere('name', "normal")['url'];
                }
            }
        } else {
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

    public static function loadUniversPicturesValid($univers)
    {
        if ($univers->picture) {
            $return = self::coreGeneralPicture(collect($univers->picture), 'univers', $univers);
        } else {
            return false;
        }
        return $return;
    }

    /**
     * @param $pictures
     * @param $recette
     * @return mixed
     */
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

                $picture->urls = self::generateUrlCollection($listLinks, $url, $urlWebp, $urlThumb, $urlIndex);

            }
        }
        return $pictures;
    }

    private static function coreGeneralPicture($pictures, $folder, $model)
    {
        // Paradigm change between old storing Picture and New with Queues
        $changev7 = Carbon::create(2019, 01, 20, 20, 10, 00);

        $originalImageUrl = '';
        $urlWebp = '';
        $urlThumb = '';
        $urlIndex = '';
        $listLinks = collect();

        // if there is a picture
        if ($pictures->isNotEmpty()) {
            foreach ($pictures as $picture) {
                // If it's a recipe
                if ($model->getTable() === "recipes") {
                    $pictureDate = Carbon::parse($picture->created_at);
                    if ($pictureDate->lessThan($changev7)) {
                        $originalImageUrl = url("/" . $folder . "/" . $model->id . "/" . intval($picture->user_id) . "/" . strip_tags(clean($picture->image_name)));
                    } else {
                        $firstPart = "/recipes/" . $model->hashid . "/" . intval($picture->user_id) . "/";
                    }
                }
                // Not a recipe model
                else {
                    $firstPart = "/" . $model->getTable() . "/" . $model->id . '/';
                    $originalImageUrl = url($firstPart . strip_tags(clean($picture->image_name)) . '.jpeg');

                    $urlWebp = url($firstPart . "square_" . strip_tags(clean($picture->image_name)) . ".webp");
                    $urlThumb = url($firstPart . "thumb_" . strip_tags(clean($picture->image_name)) . ".jpeg");
                    $urlIndex = url($firstPart . "index_" . strip_tags(clean($picture->image_name)) . ".png");
                }

                $picture->urls = self::generateUrlCollection($listLinks, $originalImageUrl, $urlWebp, $urlThumb, $urlIndex);
            }
        }
        return $pictures;
    }

    /**
     * @param $listLinks
     * @param $origin
     * @param $webp
     * @param $thumb
     * @param $index
     * @return mixed
     */
    private static function generateUrlCollection($listLinks, $origin, $webp, $thumb, $index)
    {
        $listLinks->push(['name' => 'normal', 'url' => $origin]);
        $listLinks->push(['name' => 'webp', 'url' => $webp]);
        $listLinks->push(['name' => 'thumb', 'url' => $thumb]);
        $listLinks->push(['name' => 'index', 'url' => $index]);
        return $listLinks;
    }


}

