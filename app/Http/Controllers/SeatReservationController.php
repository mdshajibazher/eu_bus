<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;

class SeatReservationController extends Controller
{
    public function index(){
        $AllBus = Bus::all();
        return view('admin.seat', compact('AllBus'));
    }
}
