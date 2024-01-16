<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->status == 'blokir') {
            if ($user->level != 'admin') {
                // Jika user diblokir, kembalikan response dengan view
                return response()->view('user.blocked');
            } else {
                return response()->view('admin.blocked');
            }
        }

        // Jika user tidak diblokir, lanjutkan ke middleware atau controller selanjutnya
        return $next($request);
    }
}