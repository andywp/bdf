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
           'email'=>'required',
           'password'=>'required'
        ]);

        $creds = $request->only('email','password');
       // dd($creds,Auth::guard('admin')->attempt($creds));
        if(Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
   }

   function logout(){
       Auth::guard('admin')->logout();
       return redirect('/');
   }
}
