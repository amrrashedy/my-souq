<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =[ "name" ,   "price" ,"qty" ,   "status" ,  "brand_id" , "category_id" ,"sub_category_id" , "description"];

    //protected $date =["deleted_at"];
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

    function orders()
    {
        return $this->belongsToMany("App\Order" ,"order_details");
    }

    // function getNameAttribute($value)
    // {
    //     return "Product : " .$value;
    // }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

}
