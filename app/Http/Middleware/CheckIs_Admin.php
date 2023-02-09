<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIs_Admin
{
    public function handle(Request $request, Closure $next, int $is_admin)
    {
        if ($is_admin == 1 && auth()->user()->is_admin != 1 ) {
            abort(403);
        }
        if ($is_admin == 0 && auth()->user()->is_admin != 0 ) {
            abort(403);
        }
        return $next($request);
    }
}
