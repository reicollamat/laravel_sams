<?php

namespace App\Http\Controllers;

use App\Models\Ddo;
use App\Models\Post;
use App\Models\User;
use App\Models\Guard;
use App\Models\Shift;
use App\Models\Firearm;
use App\Models\Contract;
use App\Models\Designation;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminIssueDdoController extends Controller
{
    public function steptwo(Request $request, $loc_id,$post_id, $array){

        //decode the json from header (bracket with comma separtion)
        $data = json_decode($array);

        // dd($data);

        //decode the array returned by json_decode to make a string
        $data = implode(",",$data);

        // dd($data);

        $contract = Contract::where('id',$loc_id)
        ->select('number_of_guards')
        ->pluck('number_of_guards')
        ->first();

        // dd($contract);

        $posts = Post::where('location_id', $loc_id)->get();

        // dd($posts);

        $curr_shift = Shift::where('post_id', $post_id)
        // ->limit(2)
        ->get();

        $shift_time = Shift::where('post_id', $post_id)
        ->limit(2)
        ->get();

        $guard_list = Guard::all();

        // dd($guard_list->toArray());

        $firearm_list = Firearm::all();

        // dd($curr_shift);

        return view('admintab.issueddo.issueddosteptwo',[
            'loc_id' => $loc_id,
            'post_id'=> $post_id,
            'data' => $data,
            'curr_shifts' => $curr_shift,
            'shift_time' => $shift_time,
            'posts' => $posts,
            'guard_lists'=>$guard_list,
            'firearm_lists'=> $firearm_list,
            'curr_contract' => $contract,
        ]);
    }
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
        ->where('status',3)
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
        ->with('shift')
        ->get();

        // dd($curr_posts->toArray());


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
    public function store(Request $request,$loc_id,$post_id,$array): RedirectResponse
    {   
        $request->validate([
            'start_date' => ['required', 'date'],
        ]);

        // a string to an array mapping
        $explode_id = array_map('intval', explode(',', $array));

        // dd($explode_id);


        //get current admin name and last name 
        $operations_manager = Auth::user()->name . " " . Auth::user()->last_name;

        //get current instance of contract table to update
        $curr_contract = Contract::findOrFail($loc_id);

        // update the status record to approved
        $curr_contract->status = 4;
        //save the update
        $curr_contract->save();


        // if ($curr_contract) {
        //     $curr_contract->status = 4;
        //     $curr_contract->save();
        // }

        // assign_gun
        // assign_guard

        // dd($request->toArray());
        // dd($curr_contract);

        // foreach ($request->assign_gun as $id) {
        //     echo $id;
        // }

        
            
        // dd($request->assign_gun);

        $savethis_db = Ddo::create([
            'start_date' => $request->start_date,
            'operations_manager' => $operations_manager,
            'contract_id' => $loc_id,
            'is_finished' => true,
            'approved_date' => date("Y-m-d H:i:s"),
        ]);

        $savethis_db->save();

        
        foreach(array_combine($request->assign_gun, $request->assign_guard) as $d1 => $d2) {
            // echo $d1 . "from gun";
            // echo  . "from guard";
            Designation::create([
                'ddo_id' => $savethis_db->id,
                'guard_id' => $d1,
                'firearm_id' =>$d2,
                // 'post_id' => 1, 
            ]);
        }
        

        $status = "Successfully Added and Approved";
        
        return redirect('/ddo')->with('status', $status);
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
