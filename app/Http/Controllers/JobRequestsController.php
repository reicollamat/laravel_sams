<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // checks if last contract is finished
        $check = Contract::get()->last();
        if ( $check->is_finished == 1) 
        {
            // get user id 
            $users_id = Auth::user()->id;
            $currentdate = now();

            Contract::create([
                'is_finished' => 0,
                'users_id' => $users_id,
                'issued_date' => $currentdate,
                'status' => 1,
            ]);
        }

        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        $users_id = Auth::user()->id;

        $contract = Contract::where('id','=',$users_id)->first();

        Location::create([
            'locations_name' => $request->locations_name,
            'address' => $request->address,
            'contracts_id' => $contract->id, // for testing purposes
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
            'place' => ['required', 'string', 'max:255','unique:'.Post::class],
            'is_armed' => ['required', 'string', 'max:1'],
        
        ]);

        $location = Location::all();

        Post::create([
            'place' => $request->place,
            'is_armed' => $request->is_armed,
            'locations_id' => $location->id // for testing purposes
        ]);

        $status = 'Post Added!';

        return redirect('/jobrequest/post')->with('status',$status);
    }
    
}
