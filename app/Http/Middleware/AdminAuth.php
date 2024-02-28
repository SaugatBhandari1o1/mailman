<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(!auth()->user()->is_admin){
                return redirect()->route('dashboard')->with('error','Cannot Access that page');
            }
        }else{
            return redirect()->route('login')->with('error','must be logged in');
        }
        return $next($request);
    }
}
