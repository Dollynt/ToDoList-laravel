<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CustomAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('membro_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
