<?php

namespace App\Traits\Recipe;

use App\Jobs\CheckPictureStep;
use App\RecipesSteps;
use Illuminate\Support\Facades\Auth;

trait HasSteps
{
    /**
     * @param $request
     * @param null $base
     */
    public function insertSteps($request, $base = null)
    {
        // Storing steps and attach to the recipe
        foreach ($request->step as $key => $step) {
            $newStep = RecipesSteps::firstOrCreate(
                [
                    'instruction' => $this->cleanInput($step)
                ]
            );
            $this->steps()->attach(
                $newStep,
                ['step_number' => $key + 1]
            );

            /*foreach ($request->step->picture as $picture) {
                if ($picture !== null) {
                    if ($base) {
                        if ($base === true) {
                            $media = $this->addMediaFromBase64($picture)
                                ->withCustomProperties(['checked' => false])
                                ->withResponsiveImages()
                                ->toMediaCollection();
                        }
                    } else {
                        $media = $this->addMedia($picture)
                            ->withCustomProperties(['checked' => false])
                            ->withResponsiveImages()
                            ->toMediaCollection();
                    }

                    // always attach media to user and recipe
                    // todo : if first : order 0; else : increment
                    $newStep->medias()->attach([$media->id]);
                    Auth::user()->medias()->attach([$media->id]);
                    // then check if recipe is publishable, if not detach and delete
                    CheckPictureStep::dispatch($media, $step);
                }
            }*/

            /*$path = $step->photo->store('public/uploads');
            $picture = $this->addMedia($picture)->toMediaCollection('step');
            PictureThumbnail::dispatch($newStep, $path, 'thumbnail');*/
        }
    }

    /**
     * @param $request
     * @param null $base
     */
    public function updateSteps($request, $base = null)
    {
        // Storing steps and attach to the recipe
        foreach ($request->step as $key => $step) {
            $newStep = RecipesSteps::firstOrCreate(
                [
                    'instruction' => $this->cleanInput($step)
                ]
            );
            $this->steps()->attach(
                $newStep,
                ['step_number' => $key + 1]
            );

            foreach ($request->step->picture as $picture) {
                if ($picture !== null) {
                    $media = self::insertPictureModel($base, $picture, false, false);
                    // always attach media to user and recipe
                    // todo : if first : order 0; else : increment
                    if ($media) {
                        $newStep->medias()->attach([$media->id]);
                        Auth::user()->medias()->attach([$media->id]);
                        // then check if recipe is publishable, if not detach and delete
                        CheckPictureStep::dispatch($media, $step);
                    }
                }
            }

            /*$path = $step->photo->store('public/uploads');
            $picture = $this->addMedia($picture)->toMediaCollection('step');
            PictureThumbnail::dispatch($newStep, $path, 'thumbnail');*/
        }
    }
}
