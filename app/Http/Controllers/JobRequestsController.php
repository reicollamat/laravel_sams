<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JobRequestsController extends Controller
{
    public function index(): View
    {
        return view('usertab.jobrequest.index');
    }

    // location page
    public function location(): View
    {
        return view('usertab.jobrequest.location');
    }

    public function storelocation(Request $request): RedirectResponse
    {
        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        // storing foreign id
        $user_id = Auth::user()->id;


        Location::create([
            'locations_name' => $request->locations_name,
            'address' => $request->address,
            'users_id' => $user_id // for testing purposes
        ]);

        $status = 'Location Added!';

        return redirect('/jobrequest/post')->with('status',$status);
    }


    // post page
    public function post(): View
    {
        return view('usertab.jobrequest.post');
    }

    public function storepost(Request $request): RedirectResponse
    {
        $request->validate([
            'place' => ['required', 'string', 'max:255'],
            // 'is_armed' => ['required', 'tinyInteger'],
        
        ]);

        Post::create([
            'place' => $request->place,
            // 'is_armed' => $request->is_armed,
            'locations_id' => 1 // for testing purposes
        ]);

        $status = 'Post Added!';

        return redirect('/jobrequest/location')->with('status',$status);
    }
    
}
