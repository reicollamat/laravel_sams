<?php

namespace App\Http\Controllers;

use App\Models\Ddo;
use App\Models\Post;
use App\Models\Designation;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminActiveContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_contracts = Users::
        $all_contracts = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        ->join('ddos','contracts.id','=','ddos.id')
        ->select('users.id AS userid','users.name','users.last_name','contracts.id as contractid','contracts.end_date','locations.id','ddos.approved_date','contracts.status','ddos.id AS ddoid')
        // ->select('ddos.id AS ddoid')
        // ->wherein('contracts.status',[1,2])
        // ->distinct('contracts.id')
        // ->groupBy('contracts.id')
        ->where('status',4)
        ->orderByDesc('contracts.created_at')
        ->get();
        // ->paginate(2);

        // dd($all_contracts->toArray());

        return view('admintab.activecontract.index', [
            'all_contracts' => $all_contracts,
        ]);
    }


    public function show($userid,$contrid,$ddoid)
    {
        $contract_info = DB::table('users')
        ->join('contracts','contracts.user_id','=','users.id')
        ->join('locations','contracts.id','=','locations.id')
        ->join('ddos','contracts.id','=','ddos.id')
        // ->select('users.name','users.last_name','contracts.id','contracts.end_date','locations.id','ddos.approved_date','contracts.status')
        // ->select('ddos.id AS ddoid')
        // ->wherein('contracts.status',[1,2])
        // ->distinct('contracts.id')
        // ->groupBy('contracts.id')
        ->where('contracts.id',$contrid)

        ->get();

        // $loc_id = $contract_info->pluck('contrid');

        $loc_id = Location::select('id')->where('contract_id', $contrid)
        ->get();

        // dd($loc_id->toArray());

        $posts = Post::where('location_id', $contrid)->get();

        // dd($posts->toArray());
        // $curr_loc = 

        // $curr_posts = Post::where('location_id',$id)
        // ->with('shift')


        


        $curr_ddo = Ddo::where('id', $ddoid)->get();

        $curr_designation = Designation::where('ddo_id', $ddoid)
        ->join('guards','designations.guard_id','=','guards.id')
        ->join('firearms','designations.firearm_id','=','firearms.id')
        ->get();

        // dd($contract_info->toArray(),$posts->toArray(),$curr_ddo->toArray(),$curr_designation->toArray());



        return view('admintab.activecontract.contracttemplate', [
            'contract_infos' => $contract_info,
            'posts' => $posts,
            'curr_ddos' => $curr_ddo,
            'curr_designations' => $curr_designation,
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
