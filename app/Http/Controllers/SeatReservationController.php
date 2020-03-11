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
        $AllBus = Bus::all();
        return view('admin.seatrequest', compact('AllBus'));
    }

    public function show(adminSeatShowRequest $request){
        $busId = $request['bus'];
        $JourneyDate = $request['date'];
        $busname = DB::table('buses')->select('bus_name')->where('id', $busId)->first();
        $ReservationInfo = DB::table('seat_reservations')->join('users', 'seat_reservations.student', '=', 'users.id')->select('seat_reservations.*', 'users.name')->where('seat_reservations.bus',$busId)->where('seat_reservations.journey_date',$JourneyDate)->get();
        return view('admin.seat', compact('JourneyDate', 'busname', 'ReservationInfo'));
    }
}
