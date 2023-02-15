<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LocationController extends Controller
{
    // location page
    public function create(): View
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

    public function store(Request $request): RedirectResponse
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


}
