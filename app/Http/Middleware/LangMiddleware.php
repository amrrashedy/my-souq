<?php

namespace App\Http\Middleware;

use Closure;

class LangMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     
     //  dd($request);
    // echo "xxx";

    // if (session()->has("locale"))
    // {
    //    if ( session()->get("locale" ) == "ar") 
    //    {
    //         session()->put("locale" ,"en");
    //    }else {
    //         session()->put("locale" ,"ar");
    //    }
    // }else {
    //    if (app()->getLocale() == "en") 
    //    {
    //     session()->put("locale" ,"ar");
    //    }else{
    //     session()->put("locale" ,"en");
    //    }
    // }
    
        if ($request->lang == "ar")
        {
            session()->put("locale" ,"ar");
         //   app()->setLocale("ar");
        }else if($request->lang == "en") {
        
            session()->put("locale" ,"en");
           // app()->setLocale("en");
        }
       
        return $next($request);
    }
}
