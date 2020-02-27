<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    
    function company()
    {
        return $this->hasOne("App\Company" ,"id");
    }
}
