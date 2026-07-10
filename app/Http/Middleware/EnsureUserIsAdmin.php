<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!auth()->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        if (!auth()->user()->is_admin) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('filament.admin.auth.login');
        }

        return $next($request);
    }
}
