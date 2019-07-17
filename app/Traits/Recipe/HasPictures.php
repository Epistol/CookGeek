<?php


namespace App\Traits\Recipe;

use App\Jobs\CheckPicture;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Models\Media;

/**
 * Trait HasPictures
 * @package App\Traits\Recipe
 */
trait HasPictures
{

    /**
     * @param null $valid
     * @param null $skip
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getNonAuthorPictures($valid = null, $skip = null)
    {
        $picturesOfAuthor = collect([]);
        $pictureSetCount = $this->medias()->count();
        if ($pictureSetCount > 0) {
            if ($valid) {
                $pictureSet = $this->medias()->wherePivot('valid', true)->get();
            } else {
                $pictureSet = $this->medias()->wherePivot('valid', false)->get();
            }
            if ($skip) {
                $pictureSet = $pictureSet->splice($skip);
            }
            $picturesOfAuthor = $pictureSet->filter(function ($value) {
                // if the user still exist, otherwise we don't show his pictures
                if ($value->users()->count() > 0) {
                    if ($value->users()->first()->id !== $this->id_user) {
                        return $value;
                    }
                }
            });
        }
        return $picturesOfAuthor;
    }

    /**
     * @param null $valid
     * @param null $skip
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getAuthorPictures($valid = null, $skip = null)
    {
        $picturesOfAuthor = collect([]);
        $pictureSetCount = $this->medias()->count();
        if ($pictureSetCount > 0) {
            if ($valid) {
                $pictureSet = $this->medias()->wherePivot('valid', $valid)->get();
            } else {
                $pictureSet = $this->medias()->get();
            }
            if ($skip) {
                $pictureSet = $pictureSet->splice($skip);
            }
            $picturesOfAuthor = $pictureSet->filter(function ($value) {
                // if the user still exist, otherwise we don't show his pictures
                if ($value->users()->count() > 0) {
                    if ($value->users()->first()->id === $this->id_user) {
                        return $value;
                    }
                }
            });
        }
        return $picturesOfAuthor;
    }

    /**
     * @param bool $valid
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getBestPicture($valid = false)
    {
        $bestPicture = collect([]);

        if ($valid === true) {
            $countSet = $this->medias()->wherePivot('valid', true)->count();
        } else {
            $countSet = $this->medias()->count();
        }

        if ($countSet > 0) {
            if ($valid === true) {
                $pictureSet = $this->medias()->wherePivot('valid', true)->get();
            } else {
                $pictureSet = $this->medias()->get();
            }

            $likedMedias = collect([]);
            foreach ($pictureSet as $media) {
                // get the medias that got likes
                if ($media->likes()->count() > 0) {
                    $likedMedias->push(['media' => $media, 'count' => $media->likes()->count()]);
                }
            }
            // TODO check that
            if ($likedMedias->isEmpty()) {
                $bestPicture->push($this->medias()->first());
            }

            /*            if ($likedMedias->isNotEmpty()) {
                            // get the media who got more likes
                            // ?maybe a little shuffle to not always get same picture
                        } else {
                            // if no like, always return first picture
                            $bestPicture->push($this->medias()->first());
            //                return $this->getFirstMedia();
                        }*/
        }

        return $bestPicture;
    }



    /**
     * @param $request
     * @param bool $first / Is it first picture ?
     * @param null $base
     * @return Media
     */
    public function insertPicture($request, $first = false, $base = null)
    {
        $picture = isset($request->resume) ? $request->resume : null;
        if ($picture !== null) {
            $media = self::insertPictureModel($base, $picture, false, $first);
            // always attach media to user and recipe
            if ($media) {
                $this->medias()->attach([$media->id]);
                Auth::user()->medias()->attach([$media->id]);
                // then check if recipe is publishable, if not detach and delete
                CheckPicture::dispatch($media, $this);
            }
            return $media;
        }
    }
}
