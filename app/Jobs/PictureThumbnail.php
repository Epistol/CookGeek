<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PictureThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    private $imagePath;
    /**
     * @var string
     */
    private $suffix;
    /**
     * @var int|null
     */
    private $width;
    /**
     * @var int|null
     */
    private $height;
    private $recipe;
    /**
     * @var string
     */
    private $imageContent;
    /**
     * @var string
     */
    private $imageName;
    private $user;
    /**
     * @var string
     */
    private $typePicture;

    /**
     * Create a new job instance.
     *
     * @param $recipe
     * @param string $imageContent
     * @param string $imageName
     * @param $user
     * @param string $typePicture
     * @param int|null $width
     * @param int|null $height
     */
    public function __construct($recipe, string $imageContent, string $imageName, $user, string $typePicture, int $width = null, ?int $height = null)
    {
        $this->width = $width;
        $this->height = $height;
        $this->recipe = $recipe;
        $this->imageContent = $imageContent;
        $this->imageName = $imageName;
        $this->user = $user;
        $this->typePicture = $typePicture;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $image2 = str_replace('data:image/png;base64,', '', $this->imageContent);
        $image2 = str_replace(' ', '+', $image2);
        $image_decoded = base64_decode($image2);

        $image = Image::make($image_decoded);
        if ($this->height) {
            $image = $image->fit($this->width, $this->height);
        } else {
            $image = $image->resize($this->width, null);
        }

        $path = public_path('/recipes/' . $this->recipe . '/' . $this->user . '/');

        File::exists($path) or File::makeDirectory($path);

        $image->save($path . '/' .  $this->imageName);

    }

}
