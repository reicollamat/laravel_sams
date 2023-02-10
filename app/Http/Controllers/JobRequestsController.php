<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobRequestsController extends Controller
{
    public function index(): View
    {
        return view('usertab.jobrequest.index');
    }

    public function create(): View
    {
        return view('usertab.jobrequest.location');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        Location::create([
            'locations_name' => $request->locations_name,
            'address' => $request->address,
            'users_id' => 1 // for testing purposes
        ]);

        $status = 'Location Added!';

        return redirect('/jobrequest/location')->with('status',$status);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
    
}
