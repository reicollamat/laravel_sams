<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use App\Models\Post;
use App\Models\Shift;
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
        // get user id 
        $users_id = Auth::user()->id;
        $currentdate = now();

        $contract = Contract::where('users_id','=',$users_id)->latest('id')->first();

        if ($contract === null || $contract->is_finished == 1){
            Contract::create([
                'is_finished' => 0,
                'users_id' => $users_id,
                'issued_date' => $currentdate,
                'status' => 1,
            ]);
        }

        $location_data = Location::all();

        return view('usertab.jobrequest.location', ['locations'=> $location_data]);
    }

    public function storelocation(Request $request): RedirectResponse
    {
        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        // get user id 
        $users_id = Auth::user()->id;

        $contract = Contract::where('users_id','=',$users_id)->latest('id')->first();
        

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
        $post_data = Post::all();
        return view('usertab.jobrequest.post',['posts'=>$post_data]);
    }

    public function storepost(Request $request): RedirectResponse
    {
        $request->validate([
            'place' => ['required', 'string', 'max:255'],
            'is_armed' => ['required', 'string', 'max:1'],
        
        ]);

        dd($request);

        // get user id 
        $users_id = Auth::user()->id;

        $contract = Contract::where('users_id','=',$users_id)->latest('id')->first();

        $location = Location::where('contracts_id','=',$contract->id)->latest('id')->first();

        Post::create([
            'place' => $request->place,
            'is_armed' => $request->is_armed,
            'locations_id' => $location->id // for testing purposes
        ]);

        $status = 'Post Added!';

        return redirect('/jobrequest/shift')->with('status',$status);
    }

    // Shift page
    public function shift()
    {
        $shift_data = Shift::all();
        return view('usertab.jobrequest.shift',['shifts'=>$shift_data]);
    }
    
    public function storeshift()
    {
        return redirect('/jobrequest/shift');
    }

}
