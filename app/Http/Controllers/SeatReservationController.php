<?php

namespace App\Http\Controllers;

use App\Bus;
use App\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\adminSeatShowRequest;

class SeatReservationController extends Controller
{
    public function index(){
        return view('admin.seatrequest');
    }

    public function show(adminSeatShowRequest $request){
        $allbus = Bus::all();
        $busId = $request['bus'];
        $JourneyDate = $request['date'];
        
        
        foreach($allbus as $buslist){
            $busname[] = DB::table('buses')->select('bus_name')->where('id', $buslist['id'])->first();
            $ReservationInfo[] = DB::table('seat_reservations')->join('users', 'seat_reservations.student', '=', 'users.id')->select('seat_reservations.*', 'users.name')->where('seat_reservations.bus',$buslist['id'])->where('seat_reservations.journey_date',$JourneyDate)->get();
        }
        
        return view('admin.seat', compact('JourneyDate', 'busname', 'ReservationInfo'));
    }
}
