<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Location;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

//models for index

use App\Models\User;
class AdminJobRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // $client_id = DB::table('users')->where('is_admin',0)->get();
        // $client_id = DB::table('contracts')->get();
        // $contract_details = DB::table('contracts')->join('users','users.id','=','contracts.user_id')->get();
        $contract_details = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        ->join('posts','locations.id','=','posts.location_id')
        ->select('users.name','users.last_name','contracts.id','locations.locations_name','contracts.start_date','contracts.status')
        ->get();

        // $contract_details = Location::all();
        // $contract_details = User::with(['contract'])
        //                     ->where('is_admin',0)
        //                     ->get();


        // $client_id = User::all()->where('is_admin',0);
        // compact('$client_id');
        // dd($contract_details->toArray());

        return view('admintab.jobrequest.index', [
            'contract_details' => $contract_details->toArray(),
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
        // viewjobrequest.blade

        $contract_details = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        ->join('posts','locations.id','=','posts.location_id')
        ->where('contracts.id',$id)
        ->get();

        // dd($contract_details->toArray());

        return view('admintab.jobrequest.viewjobrequest', [
            'contract_details' => $contract_details->toArray(),
        ]);
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
