<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class SuperAdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->jenis_user == "1") {
                return $next($request);
            };
            return abort(403, "Hanya Super Amdin yang berhak mengakses halaman ini");
        }
        return redirect()->route("login");
    }
}
