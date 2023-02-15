<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    
    // post page
    public function create(): View
    {
        $post_data = Post::all();
        return view('usertab.jobrequest.post',['posts'=>$post_data]);
    }

    public function store(Request $request): RedirectResponse
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

}
