<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckCoin
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
        if (Auth::check()) {
           
            if (Auth::user()->money >= 500) {
                $count = DB::table('users')->select('money')->where('id',Auth::user()->id)->first();
                $num = $count->money - 500;
                DB::table('users')->where('id',Auth::user()->id)->update(['money' => $num]);
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        }
        else{
            return redirect()->route('login');
        }
    }
}
