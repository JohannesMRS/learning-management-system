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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!$request->session()->has('user_id')){
            return redirect()->route('login')->withErrors([
                'login_error'=> 'Login Dulu Bang'
            ]);
        }

        $userRole = $request->session()->get('user_role');
        if(!in_array($userRole, $roles)){
            abort(403, 'Anda tidak punya hak akses');
            return back();
        }
        return $next($request);
    }
}
