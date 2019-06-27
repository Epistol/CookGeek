<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Categunivers extends Model implements TranslatableContract
{
    use Searchable, Translatable;

    public $timestamps = false;
    protected $table = 'categunivers';
    public $translatedAttributes = ['name'];
    
}
