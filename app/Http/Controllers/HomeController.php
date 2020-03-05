<?php

namespace App\Http\Controllers;

use App\Bus;
use Session;
use App\Area;
use App\Route;
use App\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SeatReserveRequest;
use App\Http\Requests\JourneyInitialValidationRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userarea = Auth::user()->area;
        $availableRouteinf = DB::table('bus_route_area')->join('route', 'bus_route_area.route', '=', 'route.id')->select('bus_route_area.*', 'route.name')->where('area',  $userarea)->get();
        $userAreaname =   Area::find($userarea)->name;
        $RouteSpecificbus  = Bus::all()->where('route', Session::get('route'));
        return view('students.home',compact('RouteSpecificbus', 'availableRouteinf', 'userAreaname'));
    }
    public function insert(JourneyInitialValidationRequest $request)
    {
        $journetDate = $request['journey_date'];
        $Route = $request['route'];
        Session::put('journetDate',$journetDate);
        Session::put('route',$Route);
        return redirect()->back();
    }

    public function seatedit($id)
    {
        $busid = $id;
        $RouteSpecificbus  = Bus::all()->where('route', Session::get('route'));
        $seatInfo = SeatReservation::all()->where('bus',$id)->where('journey_date',Session::get('journetDate'));
        return view('students.seatreserve',compact('RouteSpecificbus', 'seatInfo', 'busid'));
    }
    public function seatupdate(SeatReserveRequest $request, $id)
    {
        $reserve = new SeatReservation;
        $reserve->student = Auth::user()->id;
        $reserve->bus = $id;
        $reserve->seat = $request['seat'];
        $reserve->journey_date = Session::get('journetDate');
        $reserve->save();
        Session::forget('journetDate');
        Session::forget('route');
        Session::flash('success', 'Seat Reserved Successfull');
        return redirect(route('home'));
        
    }



}
