<?php

namespace App\Http\Controllers;

use App\Currentsession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CurrentSessionValidationRequest;

class CurrentsessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_seesion = Currentsession::all();
        return view('admin.session.index', compact('current_seesion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrentSessionValidationRequest $request)
    {

        $session_slug = $request['current_session'].$request['session_year'];
        if(count(Currentsession::all()->where('session_slug',$session_slug))>0){
            Toastr::error($session_slug.' Session Already Exists', 'warning');
            return redirect(route('currentsession.index'));
            
        }else{

            if($request->has('status')){
                DB::table('current_session')->where('status',1)->update(['status' => NULL]);
                $current_session = new Currentsession;
                $current_session->session_name = $request['current_session'];
                $current_session->session_slug = $session_slug;
                $current_session->year = $request['session_year'];
                $current_session->status = $request['status'];
                $current_session->save();
                Toastr::success('Session Saved Successfully', 'success');
                return redirect(route('currentsession.index'));

            }else{
                $current_session = new Currentsession;
                $current_session->session_name = $request['current_session'];
                $current_session->session_slug = $session_slug;
                $current_session->year = $request['session_year'];
                $current_session->save();
                Toastr::success('Session Saved Successfully', 'success');
                return redirect(route('currentsession.index'));
            }
            
           
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currentsession  $currentsession
     * @return \Illuminate\Http\Response
     */
    public function show(Currentsession $currentsession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currentsession  $currentsession
     * @return \Illuminate\Http\Response
     */
    public function edit(Currentsession $currentsession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currentsession  $currentsession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currentsession $currentsession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currentsession  $currentsession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currentsession $currentsession)
    {
        //
    }
}
