<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    function orders()
    {
        return $this->hasMany("App\Order");
    }
    
    function order_details()
    {
        return $this->hasManyThrough("App\OrderDetail" ,"App\Order");
      //return $this->hasManyThrough("App\OrderDetail" ,"App\Order" ,"order_id" ,"id" ,"id");
    }
}
