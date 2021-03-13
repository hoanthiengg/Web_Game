<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Checkown
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
        if(Auth::check()){
            if(Auth::user()->id == $request->route('id')){
                return $next($request);
            }
            else
            {
                return response();
            }
        }
        else{
            return $next($request)->route('login');
        }
        
    }
}
