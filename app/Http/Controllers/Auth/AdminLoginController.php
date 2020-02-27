<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminLoginRequest;
use Session;


class AdminLoginController extends Controller
{
  
    public function adminLogin(){
        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.dashboard'));
        }else{
            return view('admin.auth.login');
        }
        
    }
    public function adminLoginSubmit(adminLoginRequest $request){

        $credentials = ['adminname' => $request->adminname, 'password' => $request->password];
        $remember = $request->remember;
        if (Auth::guard('admin')->attempt($credentials,$remember)) {
            return redirect(route('admin.dashboard'));
        }else{
            Session()->flash('error', 'Invalid User/Password Conbination');
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::regenerate();
        return redirect(route('admin.login'));
    }


}
