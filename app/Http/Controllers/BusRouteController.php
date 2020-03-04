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
        $routeId = $id;
        $RouteWiseAreaInformation = DB::table('bus_route_area')->where('route', $id)->get();
        $route= Route::all();
        $area = Area::all();
        return view('admin.route.editarea',compact('RouteWiseAreaInformation','area', 'route','routeId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(busrouteValidationRequest $request, $id)
    {

        if(DB::table('bus_route_area')->where('route', $id)->exists()){
            DB::table('bus_route_area')->where('route', '=', $id)->delete();
        }
        $requested_route = $request['route'];
        $requested_area = $request['area'];
        foreach($requested_area as $arrayindex => $areaid){
            DB::table('bus_route_area')->insert(
                ['route' => $id, 'area' => $areaid]
            );
        }
        Toastr::success('Route Updated Successfully', 'success');
        return redirect()->back();
    }


}
