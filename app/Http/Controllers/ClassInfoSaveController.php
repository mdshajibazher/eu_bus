<?php

namespace App\Http\Controllers;
use Session;
use App\Information;
use App\Currentsession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ClassInfoSaveRequest;

class ClassInfoSaveController extends Controller
{
    public function save(ClassInfoSaveRequest $request){
        $current_session = Currentsession::all()->where('status',1)->first();
        $session_slug = $current_session->session_slug;
        $classtartArray =  $request->class_start;
        $classEndArray =  $request->class_end;

        $dayNameList = Session::get('dayName');
        
        foreach ($dayNameList as $key => $dayinfo){
        $infomation  = new Information;
        $infomation->student = Auth::user()->id;
        $infomation->current_session = $session_slug;
        $infomation->class_start = $classtartArray[$key];
        $infomation->class_end = $classEndArray[$key];
        $infomation->day = $dayinfo;
        $infomation->save();
        }
        Session::forget('dayName');
        Session::flash('message', 'Information saved successfully!');
        return redirect()->back();

        
    }
}
