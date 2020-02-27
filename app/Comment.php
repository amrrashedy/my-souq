<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function xxx()
    {
        return $this->morphTo();
    }
}
