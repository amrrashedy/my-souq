<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    function change($locale)
    {
        if ($locale == "ar")
        {
          //  App::setLocale("ar");
          session()->put("locale" ,"ar");
        }else {
           // App::setLocale("en");
           session()->put("locale" ,"en");
        }

        return redirect("/test");
   //   echo config("app.locale");
     // echo trans("welcome");
    }
}
