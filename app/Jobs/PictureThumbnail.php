<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
     * @param string   $typePicture
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
     */
    public function handle()
    {
        // Remove any trace of file extension in base64
        $image2 = preg_replace('#^data:image/[^;]+;base64,#', '', $this->imageContent);
        $image2 = str_replace(' ', '+', $image2);
        $image_decoded = base64_decode($image2);

        $image = Image::make($image_decoded);
        $image = $this->resizing($image);
        $name = $this->naming($this->imageName);

        $recipepath = public_path('/recipes/'.$this->recipe);
        File::exists($recipepath) or File::makeDirectory($recipepath);

        $path = public_path('/recipes/'.$this->recipe.'/'.$this->user.'/');
        File::exists($path) or File::makeDirectory($path);
        $image->save($path.'/'.$name);
    }

    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
        return $exception;
    }

    private function resizing($image)
    {
        switch ($this->typePicture) {
            case 'thumbnail':
                $image = $image->fit(150, 150)->encode('jpeg');
                break;
            case 'indexRecipe':
                $image = $image->fit(300, 150)->encode('png');
                break;
            case 'thumbSquare':
                $image = $image->fit(250, 250)->encode('webp');
                break;
            default:
                if ($this->height) {
                    $image = $image->fit($this->width, $this->height)->encode('jpeg', 90);
                } elseif ($this->width) {
                    $image = $image->resize($this->width, null)->encode('jpeg', 90);
                } else {
                    $image = $image->fit(1096, null)->encode('jpeg', 90);
                }
                break;
        }

        return $image;
    }

    private function naming($imageName)
    {
        switch ($this->typePicture) {
            case 'thumbnail':
                $imageName = 'thumb_'.$imageName.'.jpeg';
                break;
            case 'indexRecipe':
                $imageName = 'index_'.$imageName.'.png';
                break;
            case 'thumbSquare':
                $imageName = 'square_'.$imageName.'.webp';
                break;
            default:
                $imageName = $imageName.'.jpeg';
                break;
        }

        return $imageName;
    }
}
