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
    public $timestamps = false;

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
        return $this->morphedByMany('App\Recipe', 'universable');
    }

    /**
     * @param $text
     *
     * @return mixed
     */
    public function get_first($text)
    {
        $univ = Univers::select('id')->where('name', 'like', '%' . $text . '%')->get();

        return $univ;
    }
}
