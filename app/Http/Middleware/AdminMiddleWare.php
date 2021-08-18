<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( auth()->check() && auth()->user()->role->name === "admin") # checks for a user account
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login') ;
        }
    }
}
