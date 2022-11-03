<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function check(Request $request){

        $request->validate([
            'username'=>'required',
            'password'=>'required|string'
         ]);
        //  /dd($request->all());
         $creds = $request->only('username','password');

         $remember=isset($request->remember)?true:false;
         if(Auth::guard('web')->attempt($creds, $remember)){
            //dd(Auth::user());
            if(Auth::user()->active == 1){
                switch (Auth::user()->type_user) {
                    case  'Physical Attendance':
                        return redirect()->route('physicalattendance');
                    break;
                    case  'Virtual Attendance':
                        return redirect()->route('virtualattendance');
                    break;
                    case  'Media':
                        return redirect()->route('media');
                    break;
                    case  'Guest':
                        return redirect()->route('guest');
                    break;
                    default:
                    return redirect()->route('commitee');
                }
            }else{
                Auth::guard('web')->logout();
                return redirect()->route('login')->withErrors('Account disabled by admin. please contact admin');
            }
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
