<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use Searchable;

    protected $table    = 'pages';
    protected $fillable = ['name', 'contenu', 'slug'];
}
