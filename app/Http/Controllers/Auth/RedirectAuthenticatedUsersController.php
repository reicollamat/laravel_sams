<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect('/admindashboard');
        }
        elseif(auth()->user()->is_admin == 0){
            return redirect('/userdashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
