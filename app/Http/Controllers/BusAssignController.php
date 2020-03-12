<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\busUpdateRequest;

class BusAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        //
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
        $routeId = $id;
        $Unassignedbus= Bus::all()->where('route', NULL);
        $bus =  Bus::all()->whereNotNull('route');
        return view('admin.route.editbus',compact('bus','routeId','Unassignedbus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(busUpdateRequest $request, $id)
    {
        
        if(DB::table('buses')->where('route', $id)){
            DB::table('buses')->where('route', $id)->update(['route' => NULL]);
        }
       
        $busid = $request['bus'];
        if($request->has('bus')){
            foreach($busid as $requested_id){
                Bus::where('id', $requested_id)->update(['route' => $id]);
            }
            Toastr::success('Bus Updated Successfully', 'success');
            return redirect()->back();
        }else{
            Toastr::Warning('All Bus Removed From This Route', 'Warning');
            return redirect()->back();
        }
        
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
