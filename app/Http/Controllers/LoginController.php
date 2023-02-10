<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo;
    public function redirectTo($redirectTo)
    {
        switch(Auth::user()->is_admin){
            case 'admin':
            $this->redirectTo = '/admin';
            return $this->redirectTo;
                break;
            case 'user':
                $this->redirectTo = '/user';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }
        // return $next($request);
}
