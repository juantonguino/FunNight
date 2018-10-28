<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
            return redirect('/admin');
        }
        else if(Auth::user()->role== "usuario"){
            return $next($request);
        }
        else if(Auth::user()->role== "establecimiento"){
            return redirect('/vendor');
        }
    }
}
