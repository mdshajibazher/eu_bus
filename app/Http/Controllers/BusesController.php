<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;
use App\Http\Requests\AddBusRequest;
use Brian2694\Toastr\Facades\Toastr;

class BusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = Bus::all();
        return view('admin.bus.buslist', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bus.addbus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBusRequest $request)
    {
        $bus = new Bus;
        $bus->bus_name = $request['bus'];
        $bus->save();
        Toastr::success('Bus Created Successfully', 'success');
        return redirect(route('studentbus.index'));
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
        $businf = Bus::find($id)->first();
        return view('admin.bus.editbus',compact('businf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddBusRequest $request, $id)
    {
        $businf = Bus::find($id)->first();
        $businf->bus_name = $request['bus'];
        $businf->update();
        Toastr::success('Bus Updated Successfully', 'success');
        return redirect(route('studentbus.index'));

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
