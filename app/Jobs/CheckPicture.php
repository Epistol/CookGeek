<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Sightengine\SightengineClient;

class CheckPicture implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $recipe;
    private $media;

    /**
     * Create a new job instance.
     *
     * @param $media
     * @param $recipe
     */
    public function __construct($media, $recipe)
    {
        //
        $this->recipe = $recipe;
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //analyze the locally stored image for nudity
        // wad : weapon, alcool, drugs
        $sightEngine = new SightengineClient(env('SIGHTENGINE_USER'), env('SIGHTENGINE_KEY'));
        $path = $this->media->getPath();
        $imageCheck = $sightEngine->check(['nudity', 'wad', 'offensive', 'face-attributes'])
            ->set_file($path);

        if ($imageCheck->status !== 'success') {
            // delete picture
            $mediaItems =  $this->recipe->getMedia();
            $media = $mediaItems->where('id', $this->media->id)->first();
            $media->delete();
        }
    }
}
