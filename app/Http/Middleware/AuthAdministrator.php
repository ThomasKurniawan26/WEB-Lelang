<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthAdministrator
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
         $user = Auth::guard('web') -> user();
         if(is_null($user)){
            return redirect('/login-administrator') -> with('alertFailed','Autentikasi dibutuhkan silahkan login terlebih dahulu');
         } 

        return $next($request);
    }
}
