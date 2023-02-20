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
        // fetch current user's data
        $user = Auth::user();

        // fetch current contract with its relation to location model
        $contract = Contract::where('user_id','=',$user_id)
            ->with(['location'])
            ->get();

        // fetch the latest contract (for checking if is_finished)
        $checkcontract = Contract::where('user_id','=',$user_id)
            ->with(['location'])->latest('id')->first();

        return view('usertab.jobrequest.index')->with([
            'user_id'=>$user_id,
            'user_data'=>$user,
            'contracts'=>$contract,
            'checkcontract'=>$checkcontract]);
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

        
        return view('usertab.jobrequest.location')->with([
            'user_id'=>$user_id, 
            'contract_id'=>$contract_id, '
            locations'=>$location_data]);
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


        // checks if location table is null or column current "contract_id" has already
        $checklocation = Location::where('contract_id','=',$contract_id)->latest('id')->first();
        if ($checklocation === null || $checklocation->contract_id != $contract_id){
            // saving a new location in database related to current contract
            $contract->location()->save($location);
        }

        // fetch current location id
        $location_id = Location::where('contract_id','=',$contract_id)->latest('id')->first();

        $status = 'Location Successfully Added!';
        return redirect(route('jobrequest.post',['contract_id'=>$contract_id, 'location_id'=>$location_id]))->with('status',$status);
    }



    // post page
    public function post($contract_id, $location_id): View
    {
        // retrieve all data from posts table of current location
        $post_data = Post::where('location_id','=',$location_id)->get();
        $location_data = Location::find($location_id);

        return view('usertab.jobrequest.post')->with([
            'contract_id'=>$contract_id, 
            'location_id'=>$location_id ,
            'posts'=>$post_data, 
            'locations'=>$location_data]);
    }
    public function storepost(Request $request, $location_id): View
    {
        $contract_id = $request->contract_id;

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

        $status = 'Post Successfully Added!';
        return view('usertab.jobrequest.shift')->with([
            'status'=>$status, 
            'contract_id'=>$contract_id, 
            'location_id'=>$location_id,
            'post_id'=>$post->id]);
    }



    // Shift page
    public function shift(Request $request, $post_id): View
    {
        $contract_id = $request->contract_id;
        $location_id = $request->location_id;

        return view('usertab.jobrequest.shift')->with([
            'contract_id'=>$contract_id, 
            'location_id'=>$location_id,
            'post_id'=>$post_id]);
    }

    public function schedule(Request $request, $post_id): View
    {
        $contract_id = $request->contract_id;
        $location_id = $request->location_id;

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


        return view('usertab.jobrequest.schedule')->with([
            'contract_id'=>$contract_id, 
            'location_id'=>$location_id,
            'post_id'=>$post_id,
            'schedules'=>$schedules,
            'shifts'=>$shiftsno, 
            'guardspershift'=>$guardspershift, 
            'days'=>$days,
            'status'=>null]);
    }
    
    public function storeshift(Request $request, $post_id): RedirectResponse
    {
        $contract_id = $request->contract_id;
        $location_id = $request->location_id;

        $shifts = $request->shifts;
        $days = $request->days;
        $schedules = $request->schedules;
        $guardspershift = $request->guardspershift;

        // changing array key start from 1
        array_unshift($schedules,"");
        unset($schedules[0]);
                

        // fetch current post id
        $post = Post::find($post_id);

        // checks if shift table is null or column current "post" has already
        $checkshift = Shift::where('post_id','=',$post_id)->latest('id')->first();
        if ($checkshift === null || $checkshift->post_id != $post_id){

            foreach ($days as $key => $day) {
                foreach ($schedules as $key => $schedule) {
                    
                    // instantiates a new Shift
                    $shift = new Shift([
                        'day' => $day,
                        'start_time' => date("H:i:s",strtotime(substr($schedule,0,8))) ,
                        'end_time' => date("H:i:s",strtotime(substr($schedule,9))),
                    ]);

                    // saving a new shift in database related to current post
                    $post->shift()->save($shift);

                }
            }

            $status = 'Schedule Successfully Added!';

        }
        else
        {
            $status = null;
        }

        return redirect(route('jobrequest.post',['contract_id'=>$contract_id, 'location_id'=>$location_id]))->with('status',$status);
    }

}
