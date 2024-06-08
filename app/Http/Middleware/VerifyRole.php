<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && ($user->roles == 'Admin' || $user->roles == 'User')) {
            return $next($request);
        } else {
            Session::invalidate(); 
            Session::regenerateToken(); // Regenerate CSRF token
            Auth::logout(); // Logout user
            Session::flash('alert', 'Mohon login dengan akun yang sesuai');
            return redirect('/');
        }
    }
}
