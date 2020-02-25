<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    function change(Request $request)
    {
     // var_dump( $request->xx ); 
        // if ($request->locale == "ar")
        // {
        //   //App::setLocale("ar");
        //   //app()->setLocale("ar");
        //   session()->put("locale" ,"ar");
        // }else {
        // //  app()->setLocale("en");
        //   session()->put("locale" ,"en");
        // }

      return redirect()->back();
   //   echo config("app.locale");
     // echo trans("welcome");
    }
}
