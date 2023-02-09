<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GuardController extends Controller
{
    public function index(Request $request)
    {
        return dd($request);
    }
}
