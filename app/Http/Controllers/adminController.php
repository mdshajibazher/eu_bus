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


    for($n=0;$n<count($starting_time);$n++){
    for($k=0;$k<count($ending_time);$k++){
        if($k<$n){
             
        }else{
             $time_array[] =  [$starting_time[$n],$ending_time[$k]];
        }
    }
  }


    for($i=0;$i<=count($time_array)-1; $i++){
        $from[] = $time_array[$i][0];
        $to[] = $time_array[$i][1];
        $info[] = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->where('class_start',$from[$i])->where('class_end', $to[$i])->where('day', $day)->where('current_session',$current_session)->get();
    }

        
    return view('admin.dashboard', compact('info', 'from', 'to', 'day', 'current_session','time_array'));

    }


}
