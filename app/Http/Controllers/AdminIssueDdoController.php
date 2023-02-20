<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $active_ddo = User::with(['contract'])
        ->where('is_admin',0)
        ->get();

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
        return view('admintab.issueddo.index', [
            'active_ddos' => $active_ddo,
            // 'curr_locs' => $curr_loc,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
