<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function check(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
         ]);
        //  /dd($request->all());
         $creds = $request->only('email','password');
         $remember=isset($request->remember)?true:false;
         if(Auth::guard('web')->attempt($creds, $remember)){
             return redirect()->route('landing');
         }else{
             return redirect()->route('login')->withErrors('Incorrect credentials');
         }
    }


    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
