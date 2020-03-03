<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Area;
use App\Route;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){
       
        return view('admin.dashboard');
    }

    public function busroute(){
        $route= Route::all();
        $area = Area::all();
        $bus = Bus::all();
        return view('admin.route.busroute',compact('route','area', 'bus'));
    }
    public function busrouteCreate(Request $request){
        return $request;
    }
}
