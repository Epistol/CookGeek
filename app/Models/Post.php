<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'author_id'];

    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
}
