<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Univers extends Model
{
    use Searchable;
    public $timestamps = false;
    protected $table = 'univers';

public function get_first($text){
    $univ = DB::table('univers')->select('id')->where('name', 'like', '%' . $text . '%')->get();

    return $univ;
}




}
