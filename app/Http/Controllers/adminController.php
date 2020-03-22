<?php

namespace App\Http\Controllers;

use App\Bus;
use App\TimeSlot;
use App\User;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Currentsession;

class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){

        $day = Carbon::now()->format( 'l' );
        $sessionrow =  Currentsession::all()->where('status',1)->first();
        $current_session = $sessionrow->session_slug;



    $timeslot = TimeSlot::all();
    foreach ($timeslot as $key => $slot) {
         $starting_time[] = $slot->start;
         $ending_time[] = $slot->end;
    }



    $time_array = [
        [$starting_time[0],$ending_time[0]],
        [$starting_time[0],$ending_time[1]],
        [$starting_time[0],$ending_time[2]],
        [$starting_time[0],$ending_time[3]],
        [$starting_time[0],$ending_time[4]],
        [$starting_time[0],$ending_time[5]],
        [$starting_time[0],$ending_time[6]],

        [$starting_time[1],$ending_time[1]],
        [$starting_time[1],$ending_time[2]],
        [$starting_time[1],$ending_time[3]],
        [$starting_time[1],$ending_time[4]],
        [$starting_time[1],$ending_time[5]],
        [$starting_time[1],$ending_time[6]],

        [$starting_time[2],$ending_time[2]],
        [$starting_time[2],$ending_time[3]],
        [$starting_time[2],$ending_time[4]],
        [$starting_time[2],$ending_time[5]],
        [$starting_time[2],$ending_time[6]],

        [$starting_time[3],$ending_time[3]],
        [$starting_time[3],$ending_time[4]],
        [$starting_time[3],$ending_time[5]],
        [$starting_time[3],$ending_time[6]],

        [$starting_time[4],$ending_time[4]],
        [$starting_time[4],$ending_time[5]],
        [$starting_time[4],$ending_time[6]],

        [$starting_time[5],$ending_time[5]],
        [$starting_time[5],$ending_time[6]],

        [$starting_time[6],$ending_time[6]],
    ];








    for($i=0;$i<=count($time_array)-1; $i++){
        $from[] = $time_array[$i][0];
        $to[] = $time_array[$i][1];
        $info[] = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->where('class_start',$from[$i])->where('class_end', $to[$i])->where('day', $day)->where('current_session',$current_session)->get();
    }

        
    return view('admin.dashboard', compact('info', 'from', 'to', 'day', 'current_session'));

    }


}
