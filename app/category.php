<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    function sub_categories_one_to_many(){
        // if you unfllow naming convention
      // return $this->hasMany('App\subCategory','category_id','id');

      // return relationship one to many
       return $this->hasMany('App\subCategory');


    }
}
