<?php

namespace App\Http\Controllers;

use App\Bus;
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
        //$from = now()->toTimeString();
        $from = '09:00:00';
        $to = '19:40:00';
        $day = Carbon::now()->format( 'l' );
        $sessionrow =  Currentsession::all()->where('status',1)->first();
        $current_session = $sessionrow->session_slug;
        $inf = DB::table('information')->join('users', 'information.student', '=', 'users.id')->select('information.*','users.name', 'users.address', 'users.area')->whereBetween('class_start', [$from, $to])->whereBetween('class_end', [$from, $to])->where('day', $day)->where('current_session',$current_session)->get();
        return view('admin.dashboard', compact('inf', 'from', 'to', 'day', 'current_session'));

    }


}
