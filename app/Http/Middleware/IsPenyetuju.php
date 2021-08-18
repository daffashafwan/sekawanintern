<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPenyetuju
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('penyetuju')->check()){
            return redirect()->route('auth.admin.login')->with('danger', 'Anda tidak memiliki akses ke halaman');
        }
        return $next($request);
    }
}
