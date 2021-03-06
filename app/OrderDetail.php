<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    function order()
    {
        return $this->belongsTo("App\Order");
    }
    function  product()
    {
        return $this->belongsTo("App\product");
    }
}
