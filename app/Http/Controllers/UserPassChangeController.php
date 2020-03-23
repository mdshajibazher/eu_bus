<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class UserPassChangeController extends Controller
{
    public function form(){
        return view('students.myprofile.changepass');
    }

    public function update(ChangePassRequest $request){

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            Session::flash('old_password','Your current password does not matches with the password you provided. Please try again.');
            return Redirect::back()->withInput();
        }

        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            Session::flash('password','New Password cannot be same as your current password. Please choose a different password.');
            return Redirect::back()->withInput();
        }


        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request['password']);
        $user->update();
        Session::flash('success','Password changed successfully !');
        Auth::logout();
        return redirect(route('login'));


    }
}
