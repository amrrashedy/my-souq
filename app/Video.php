<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'xxx');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'yyy');
    }
}
