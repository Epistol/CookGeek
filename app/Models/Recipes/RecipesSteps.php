<?php

namespace App;

use App\Traits\HasMediaCDG;
use App\Traits\HasUserInput;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class RecipesSteps extends Model
{
    use HasMediaCDG, HasUserInput, HasMediaTrait;

    public $timestamps = false;
    protected $table = 'recipes_steps';
    protected $fillable = ['instruction'];

    public function recipes()
    {
        return $this->morphedByMany(Recipe::class, 'stepable');
    }
}
