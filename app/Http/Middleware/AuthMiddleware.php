<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->session()->has('user_id')){
            return redirect()->route('login')->withErrors([
                'login_error'=> 'Login Dulu Bang'
            ]);
        }
        return $next($request);
    }
}
