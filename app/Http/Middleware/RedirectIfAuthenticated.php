<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->jenis_user == 1) {
                return redirect()->route("superadmin.index");
            } elseif (Auth::user()->jenis_user == 2) {
                return redirect()->route("admin.index");
            } elseif (Auth::user()->jenis_user == 3) {
                return redirect()->route("pasien.index");
            } elseif (Auth::user()->jenis_user == 4) {
                return redirect()->route("pelayanan.index");
            }
        }

        return $next($request);
    }
}
