<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email',
           'password'=>'required|string'
        ]);
        //dd($request->all());
        $creds = $request->only('email','password');
        $remember=isset($request->remember)?true:false;
        if(Auth::guard('admin')->attempt($creds, $remember) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->withErrors('Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('admin')->logout();
       return redirect('/');
   }
}
