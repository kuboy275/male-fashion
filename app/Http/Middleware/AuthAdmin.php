<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->is_admin == 'guest'){
                return redirect()->route('home');
            }
            else if(Auth::user()->is_admin == 'admin' || Auth::user()->is_admin == 'user'){
                return $next($request);
            }
        }
        // abort(401);
    }
}
