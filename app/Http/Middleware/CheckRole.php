<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah pengguna sudah login dan apakah perannya sesuai
        if (!Auth::check() || Auth::user()->role != $role) {
            return redirect('/'); // Redirect ke halaman utama jika tidak sesuai
        }

        // Lanjutkan ke request berikutnya jika peran sesuai
        return $next($request);
    }
}
