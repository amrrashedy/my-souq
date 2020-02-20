<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =[ "name" ,   "price" ,"qty" ,   "status" ,  "brand_id" , "category_id" ,"sub_category_id" , "description"];

    protected $attributes  =["status"=>"Available" ];

    function brand()
    {
        return $this->belongsTo("\App\brand");
    }

    function category()
    {
        return $this->belongsTo("\App\category");
    }

    function sub_category()
    {
        return $this->belongsTo("\App\subCategory");
    }

    function product_images ()
    {
        return  $this->hasMany("\App\productImage");
    }

}
