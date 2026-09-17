<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login dan rolenya sesuai
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika role tidak cocok, kembalikan 403 Unauthorized
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}