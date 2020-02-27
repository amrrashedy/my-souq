<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    public function yyy()
    {
        return $this->morphTo();
    }
}
}
