<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'yyy');
    }

    public function videos()
    {
        return $this->morphedByMany('App\Video', 'yyy');
    }
}
