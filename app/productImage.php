<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    function product()
    {
        return $this->belongsTo("\App\product");
    }
}
