<?php

namespace App\Http\Controllers;

use Session;
use App\TimeSlot;
use App\Information;
use App\Currentsession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DayValidateRequest;

class StudentJourneyInfromationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_session = Currentsession::all()->where('status',1)->first();
        $existing_inf = Information::all()->where('student',Auth::user()->id)->where('current_session',$current_session->session_slug);
        return view('students.information.index',compact('existing_inf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeslot = TimeSlot::all();
        $current_session = Currentsession::all()->where('status',1)->first();
        $info =   DB::table('information')->select('day')->where('student',Auth::user()->id)->where('current_session',$current_session->session_slug)->get();
        return view('students.information.create',compact('info','timeslot','current_session'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DayValidateRequest $request)
    {
        $dayList = collect($request->day);
        if($request->has('day')){
            Session::put('dayName',$dayList);
            return redirect()->back();
        }else{
            return $request;
        }
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
        $class_info = DB::table('information')->where('id',$id)->first();
        $timeslot = TimeSlot::all();
        $current_session = Currentsession::all()->where('status',1)->first();
        return view('students.information.edit',compact('timeslot','current_session','class_info','id'));
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
        $class_start = $request['class_start'];
        $class_end = $request['class_end'];
        DB::table('information')->where('id', $id)->update(['class_start' => $class_start, 'class_end' => $class_end]);
        Session::flash('message', 'Information Updated successfully!');
        return redirect(route('information.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Information::find($id);
        $info->delete();
        Session::flash('message', 'Information Deleted successfully!');
        return redirect()->back();
    }
}
