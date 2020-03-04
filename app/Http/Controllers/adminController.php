<?php

namespace App\Http\Controllers;

use App\Bus;
use App\User;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){


        $UsedArea = DB::table('bus_route_area')->select('area')->distinct()->get();       
        $busCount = Bus::all()->count();
        $routeCount = Route::all()->count();
        $students = User::all()->count();
        return view('admin.dashboard',compact('busCount','UsedArea','routeCount','students'));
    }


}
