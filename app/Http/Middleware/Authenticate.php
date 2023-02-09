<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            // logouts the current user signed in
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // session()->flash('message', 'You are not an Admin User!'); 
            return abort(403);
        }
    }
}
