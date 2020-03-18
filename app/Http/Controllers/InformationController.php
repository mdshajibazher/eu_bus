<?php

namespace App\Http\Controllers;

use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function index(){
        $timeslot = TimeSlot::all();
        return view('admin.information.index', compact('timeslot'));
    }
    public function retriveInformation(Request $request){
        $from = $request['from'];
        $to = $request['to'];
        $day = $request['day'];
        $current_session = $request['current_session'];
        $inf = DB::table('information')->select('*')->where('class_start', $from)->whereBetween('class_end', [$from, $to])->where('day', $day)->where('current_session', $current_session)->get();
        return view('admin.information.information', compact('inf'));
    }
}
