<?php

namespace App\Http\Middleware;

use Closure;

class WelcomeMiddleware
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
        echo "<h1>Weclome</h1>";
        return $next($request);
    }
    public function terminate($request , $response)
    {
        echo "Good Bye";
    }
}
