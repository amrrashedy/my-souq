<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    function manager()
    {
        return $this->hasOne("App\Manager" ,"id");
    }
}
