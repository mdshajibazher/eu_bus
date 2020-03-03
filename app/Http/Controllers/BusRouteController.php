<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Area;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\busrouteValidationRequest;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route= Route::all();
        $area = Area::all();
        $bus = Bus::all();
        return view('admin.route.busroute',compact('route','area', 'bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(busrouteValidationRequest $request)
    {

        $busroute = $request['route'];
        $bus = $request['bus'];
        $area_array = $request['area'];

        foreach($area_array as $arrayindex => $areaid){
            DB::table('bus_route_area')->insert(
                ['route' => $busroute, 'area' => $areaid, 'bus'=> $bus]
            );
        }
        Toastr::success('Route Route Assigned Successfully', 'success');
        return redirect(route('busroute.index'));

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RouteWiseAreaInformation = DB::table('bus_route_area')->where('route', $id)->get();
        $route= Route::all();
        $area = Area::all();
        $bus = Bus::all();
        return view('admin.route.editroute',compact('RouteWiseAreaInformation','area', 'route','bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
