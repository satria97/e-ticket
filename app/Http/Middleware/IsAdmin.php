<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::check()) 
        {
            if(Auth::user() && Auth::user()->role == 'ADMIN')
            {
                return $next($request);
            } else {
                return redirect('/home')->with('message','Akses diterima');
            }
        } else {
            return redirect('/')->with('message', 'Silahkan login terlebih dahulu');
        }
    }
}
