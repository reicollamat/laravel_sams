<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Contract;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminIssueDdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        // $curr_loc = DB::table('locations')
        // ->join('posts','locations.id','=','posts.location_id')
        // ->select(['locations_name','posts.place'])
        // ->distinct()
        // ->get();

        // $curr_loc = DB::table('users')
        // ->join('contracts','contracts.user_id','=','users.id')
        // ->join('locations','contracts.id','=','locations.id')
        // ->join('posts','locations.id','=','posts.location_id')
        // ->select('users.name','users.last_name','contracts.id','locations.locations_name','contracts.start_date','contracts.status')
        // ->get();

        // $curr_loc = Location::all()->load('post')->unique('locations_name');


        // dd($curr_loc->toArray());

        // dd($curr_loc->toArray());

        // dd($active_ddo);

        // $active_ddo = User::with('contract')
        // ->where('is_admin',0)
        // ->get();

        $active_ddo = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        // ->select('users.name','users.last_name','contracts.id','locations.locations_name','contracts.start_date','contracts.status')
        // ->wherein('contracts.status',[1,2])
        // ->distinct('contracts.id')
        // ->groupBy('contracts.id')
        ->orderByDesc('contracts.created_at')
        ->paginate(2);

        // $curr_posts = Location::with('post')->get();

        // $active_ddo = Contract::with(['location'])->get();

        // dd($active_ddo);
        // dd($curr_posts->toArray());

        return view('admintab.issueddo.index', [
            'active_ddos' => $active_ddo,
            // 'curr_posts' => $curr_posts->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $curr_ddo = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        ->where('contracts.id',$id)
        ->get();

        $curr_posts = Post::where('location_id',$id)
        // $curr_posts = Location::find($id)
        ->get();

        // dd($curr_ddo, $curr_posts);

        return view('admintab.issueddo.viewddo',[
            'curr_ddos' => $curr_ddo,
            'curr_posts' => $curr_posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
