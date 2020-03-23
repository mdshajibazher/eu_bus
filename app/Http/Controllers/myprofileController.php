<?php

namespace App\Http\Controllers;

use App\Area;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;

class myprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->join('area', 'users.area', '=', 'area.id')->join('departments', 'users.department', '=', 'departments.id')->select('users.*', 'departments.name AS department_name', 'area.name As area_name')->where('users.id',Auth::user()->id)->first();
        return view('students.myprofile.index',compact('user'));
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
        $user = DB::table('users')->join('area', 'users.area', '=', 'area.id')->join('departments', 'users.department', '=', 'departments.id')->select('users.*', 'departments.name AS department_name', 'area.name As area_name')->where('users.id',Auth::user()->id)->first();
        $Allarea = Area::all();
        return view('students.myprofile.edit',compact('user','Allarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->area = $request['area'];
        $user->update();
        Session::flash('status', 'Information Updated successfully!');
        return redirect(route('myprofile.index'));


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
