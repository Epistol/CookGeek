<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Univers extends Model
{
    use Searchable;
    public    $timestamps = false;
    protected $table      = 'univers';

    protected $fillable
        = [
            'name', 'first_creator',
        ];

    public function recipes()
    {
        return $this->morphedByMany('App\Recipe', 'universable');
    }

    public function get_first($text)
    {
        $univ = Univers::select('id')->where('name', 'like', '%' . $text . '%')->get();

        return $univ;
    }
}
