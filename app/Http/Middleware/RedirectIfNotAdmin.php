<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user || !$user->adminUser) {
            if (!$user) {
                flash()->addError('Silakan login untuk mengakses Admin Panel.');
            } else {
                flash()->addError('Anda Tidak Dapat Mengakses Admin Panel.');
            }
            return redirect()->route('adminLogin'); // Ubah rute sesuai kebutuhan Anda
        }

        return $next($request);
    }
}
