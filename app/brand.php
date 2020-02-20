<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable =['name','img'];

    function products()
    {
        return $this->hasMany("\App\product");
    }
}
