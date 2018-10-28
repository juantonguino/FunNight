<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::user()->role== "administrador"){
            return $next($request);
        }
        else if(Auth::user()->role== "usuario"){
            return redirect('/user');
        }
        else if(Auth::user()->role== "establecimiento"){
            return redirect('/vendor');
        }
    }
}
