<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =[ "name" ,   "price" ,"qty" ,   "status" ,  "brand_id" , "category_id" ,"sub_category_id" , "description"];
}
