<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $fillable =["name","category_id"];
    
    function category_many_to_one(){

        // return relationship many to one
        return $this->belongsTo("App\categry");
    }
    function products()
    {
        return $this->hasMany("\App\product");
    }
}
