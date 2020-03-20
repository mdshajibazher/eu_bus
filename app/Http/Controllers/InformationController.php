<?php

namespace App\Http\Controllers;

use App\TimeSlot;
use App\Currentsession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InformationValidationRequest;

class InformationController extends Controller
{
    public function index(){
        $timeslot = TimeSlot::all();
        $current_session = Currentsession::all()->where('status',1)->first();
        return view('admin.information.index', compact('timeslot','current_session'));
    }
    public function retriveInformation(InformationValidationRequest $request){
        
        $from = $request['from'];
        $to = $request['to'];
        $day = $request['day'];
        $current_session = $request['current_session'];
        $inf = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->whereBetween('class_start', [$from, $to])->whereBetween('class_end', [$from, $to])->where('day', $day)->where('current_session',$current_session)->get();
        return view('admin.information.information', compact('inf', 'from', 'to', 'day', 'current_session'));
    }
}
