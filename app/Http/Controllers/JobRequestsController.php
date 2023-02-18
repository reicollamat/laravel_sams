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
    public function index($user_id): View
    {
        // $user_id = Auth::user()->id;
        return view('usertab.jobrequest.index')->with(['user_id'=>$user_id]);
    }

    public function storecontract($user_id): RedirectResponse
    {
        $currentdate = now();

        // instantiates a new Contract
        $contract = new Contract([
            'is_finished' => 0,
            'issued_date' => $currentdate,
            'status' => 1,
        ]);

        // fetch current user id 
        $user = User::find($user_id);


        // checks if contract table is null or column "is_finished" has 1
        $checkcontract = Contract::where('user_id','=',$user_id)->latest('id')->first();
        if ($checkcontract === null || $checkcontract->is_finished == 1){
            // saving a new contract in database related to current user
            $user->contract()->save($contract);
        }

        // fetch current contract id
        $contract_id = Contract::where('user_id','=',$user_id)->latest('id')->first();

        return redirect(route('jobrequest.location',['user_id'=>$user_id, 'contract_id'=>$contract_id]));
    }



    // location page
    public function location($user_id, $contract_id): View
    {
        // retrieve all data from locations table of current contract
        $location_data = Location::where('contract_id','=',$contract_id)->get();

        
        return view('usertab.jobrequest.location')->with(['user_id'=>$user_id, 'contract_id'=>$contract_id, 'locations'=>$location_data]);
    }
    public function storelocation(Request $request, $contract_id): RedirectResponse
    {
        $request->validate([
            'locations_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255', 'unique:'.Location::class],
        
        ]);

        // instantiates a new Location
        $location = new Location([
            'locations_name' => $request->locations_name,
            'address' => $request->address,]);

        // fetch current contract id
        $contract = Contract::find($contract_id);

        // saving a new location in database related to current contract
        $contract->location()->save($location);

        $status = 'Location Added!';
        return redirect(route('jobrequest.post',['contract_id'=>$contract_id, 'location_id'=>$location->id]))->with('status',$status);
    }



    // post page
    public function post($contract_id, $location_id): View
    {
        // retrieve all data from posts table of current location
        $post_data = Post::where('location_id','=',$location_id)->get();
        $location_data = Location::find($location_id);

        return view('usertab.jobrequest.post')->with(['contract_id'=>$contract_id, 'location_id'=>$location_id ,'posts'=>$post_data, 'locations'=>$location_data]);
    }
    public function storepost(Request $request, $location_id): RedirectResponse
    {
        $request->validate([
            'place' => 'required',
        ]);
        // checked = 1, not checked = 0
        $is_armed = (isset($_POST['is_armed']) == '1' ? '1' : '0'); 

        // instantiates a new Post
        $post = new Post([
            'place' => $request->place,
            'is_armed' => $is_armed,
        ]);

        // fetch current location id
        $location = Location::find($location_id);

        // saving a new post in database related to current location
        $location->post()->save($post);

        $status = 'Post Added!';
        return redirect(route('jobrequest.shift',['location_id'=>$location_id, 'post_id'=>$post->id]))->with('status',$status);
    }



    // Shift page
    public function shift($location_id, $post_id): View
    {
        $post_data = Post::find($post_id);
        return view('usertab.jobrequest.shift',['location_id'=>$location_id, 'post_id'=>$post_id, 'posts'=>$post_data]);
    }

    

    public function postshift(Request $request, $post_id): View
    {
        // test code - splitting day based on number of shifts
        function SplitTime($StartTime, $EndTime, $shiftsno){
            $ReturnArray = array();
            $StartTime    = strtotime($StartTime);
            $EndTime      = strtotime($EndTime);
        
            $shift = 86400 / $shiftsno; // 86400 seconds = 24 hours
        
            while ($StartTime < $EndTime)
            {
                $ReturnArray[] = date ("h:i A", $StartTime)."-".date ("h:i A", $StartTime+$shift);
                $StartTime += $shift;
            }
            return $ReturnArray;
        }
        
        $startday = $request->startday;
        $endday = $request->endday;
        $shiftsno = $request->shiftsno;
        $starttime = $request->starttime;
        $guardspershift = $request->guardspershift;
        
        // calling the function
        $splitresult = SplitTime("2018-05-12 ".$starttime, "2018-05-13 ".$starttime, $shiftsno);
        // changing array key start from 1
        array_unshift($splitresult,"");
        unset($splitresult[0]);

        $schedules = $splitresult;

        // storing shiftno to array
        switch ($shiftsno) {
            case '1':
                $shiftsno = array('1');
                break;
            case '2':
                $shiftsno = array('1','2');
                break;
            case '3':
                $shiftsno = array('1','2','3');
                break;
            default:
                break;
        }

        // get the total days between startday and endday
        foreach (range($startday,$endday) as $day)
        {
            $days[] = $day;
        }

        return view('usertab.jobrequest.schedule')->with(['post_id'=>$post_id,'schedules'=>$schedules,'shifts'=>$shiftsno, 'guardspershift'=>$guardspershift, "days"=>$days]);
    }

    public function schedule($post_id)
    {
        $shift_data = Shift::all();
        $post_data = Post::find($post_id);
        return view('usertab.jobrequest.schedule',['post_id'=>$post_id, 'shifts'=>$shift_data, 'posts'=>$post_data]);
    }
    
    public function storeshift(Request $request, $post_id): RedirectResponse
    {
        dd($request);
        return redirect('/jobrequest/shift');
    }

}
