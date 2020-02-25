<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     function order_details()
    {
        return $this->hasMany("App\OrderDetail");
    }

    function products()
    {
        return $this->belongsToMany("App\product" ,"order_details");
    }

    
}
