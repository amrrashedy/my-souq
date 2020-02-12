<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    //
    function category_many_to_one(){

        // return relationship many to one
        return $this->belongsTo("App\categry");
    }
}
