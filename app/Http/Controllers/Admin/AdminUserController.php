<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class AdminUserController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $data=Admin::find($id);
        return view('admin.user.index',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'      => 'required|min:3|max:255',
            'email'     => 'sometimes|email:rfc,dns|email|unique:admins,email,'.$id,
        ]);

        $update=Admin::find($id);
        //dd($update);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->save();
        return redirect()->route('admin.profile.index')
                        ->with('success','Profile updated successfully');
    }

    public function updatepassword(Request $request,$id){
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'password' => 'required|confirmed|min:6'
        ]);

        $update=Admin::find($id);
        
       

        $update->password =Hash::make($request->password);
        $update->save();
        return redirect()->route('admin.profile.index')
                        ->with('success','password changed successfully');
    }

}
