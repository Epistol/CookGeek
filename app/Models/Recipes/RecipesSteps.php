<?php

namespace App;

use App\Traits\HasImages;
use App\Traits\HasUserInput;
use Illuminate\Database\Eloquent\Model;

class RecipesSteps extends Model
{
    use HasImages, HasUserInput;

    public $timestamps = false;
    protected $table = 'recipes_steps';
    protected $fillable = ['instruction'];

    public function recipes()
    {
        return $this->morphedByMany(Recipe::class, 'stepable');
    }
}
