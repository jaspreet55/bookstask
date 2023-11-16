<?php

namespace Modules\Admin\app\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
