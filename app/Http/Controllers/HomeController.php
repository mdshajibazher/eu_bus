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
        $busName = DB::table('buses')->select('bus_name')->where('id', $busid)->first();
        $RouteSpecificbus  = Bus::all()->where('route', Session::get('route'));
        $ReservationInfo = DB::table('seat_reservations')->join('users', 'seat_reservations.student', '=', 'users.id')->select('seat_reservations.*', 'users.name')->where('seat_reservations.bus',$busid)->where('seat_reservations.journey_date',Session::get('journetDate'))->get();
        return view('students.seatreserve',compact('RouteSpecificbus', 'ReservationInfo', 'busid','busName'));
    }
    public function seatupdate(SeatReserveRequest $request, $id)
    {
        $reservecheck = SeatReservation::all()->where('journey_date',Session::get('journetDate'))->where('seat',$request['seat']);

        if($reservecheck->isEmpty()){
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
        }else{
            Session::flash('booked', 'Seat '.$request['seat'].' Already Booked Try Another');
            return redirect()->back();
        }
        
    }



}
