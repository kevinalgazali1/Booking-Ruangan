<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login dan apakah rolenya sesuai
        if (!$request->user() || $request->user()->role != $role) {
            // Jika tidak sesuai → tolak akses dan redirect ke halaman utama
            return redirect('/')->with('message', 'Unauthorized.');
        }

        // Jika role sesuai → lanjutkan request ke proses berikutnya
        return $next($request);
    }
}
