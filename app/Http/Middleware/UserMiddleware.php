<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna telah masuk (autentikasi)
        if (auth()->check()) {
            // Periksa level pengguna (ganti 'level' dengan atribut yang sesuai di model pengguna)
            if (auth()->user()->level == 'user') {
                // Jika pengguna memiliki level 'user', izinkan akses
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki izin, arahkan ke halaman lain (misalnya, halaman login)
        return redirect('/auth/login');
    }
}