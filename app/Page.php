<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
	use Searchable;
	protected $fillable = ['name', 'content'];
}

