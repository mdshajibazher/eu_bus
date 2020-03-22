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


    $time_array = [
        ['09:00','10:30'],
        ['09:00','11:50'],
        ['09:00','13:20'],
        ['09:00','15:40'],
        ['09:00','17:10'],
        ['09:00','18:30'],
        ['09:00','19:40'],

        ['10:40','11:50'],
        ['10:40','13:20'],
        ['10:40','15:40'],
        ['10:40','17:10'],
        ['10:40','18:30'],
        ['10:40','19:40'],


        ['00:00','13:20'],
        ['00:00','15:40'],
        ['00:00','17:10'],
        ['00:00','18:30'],
        ['00:00','19:40'],


        ['14:30','15:40'],
        ['14:30','17:10'],
        ['14:30','18:30'],
        ['14:30','19:40'],


        ['15:50','17:10'],
        ['15:50','18:30'],
        ['15:50','19:40'],

        ['17:20','18:30'],
        ['17:20','19:40'],

        ['18:40','19:40'],
    ];


    

    // $timeslot = TimeSlot::all();
    // foreach ($timeslot as $key => $slot) {
    //         $starting_time[] = $slot->start;
    //         $ending_time[] = $slot->end;
    // }






    for($i=0;$i<=count($time_array)-1; $i++){
        $from[] = $time_array[$i][0];
        $to[] = $time_array[$i][1];
        $info[] = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->where('class_start',$from[$i])->where('class_end', $to[$i])->where('day', $day)->where('current_session',$current_session)->get();
    }



    // $timeslot = TimeSlot::all();
    // foreach($timeslot as $key => $slot){
    //     $from[] = $slot['start'];

    //     $to[] = $slot['end'];
    //     $info[] = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->whereBetween('class_start', [$slot['start'], $slot['end']])->whereBetween('class_end', [$slot['start'], $slot['end']])->where('day', $day)->where('current_session',$current_session)->get();
    // }
        
        return view('admin.dashboard', compact('info', 'from', 'to', 'day', 'current_session'));

    }


}
