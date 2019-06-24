<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Categunivers extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = 'categunivers';
}
