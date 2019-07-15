<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Univers
 * @package App
 */
class Univers extends Model
{
    use Searchable;

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'univers';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'first_creator',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function recipes()
    {
        return $this->morphedByMany(Recipe::class, 'universable');
    }

    /**
     * @param $text
     *
     * @return mixed
     */
    public function get_first($text)
    {
        return Univers::select('id')->where('name', 'like', '%' . $text . '%')->get();
    }


    /**
     * @param $value
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return cleanInput($value);
    }

}
