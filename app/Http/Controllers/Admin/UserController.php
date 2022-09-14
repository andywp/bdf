<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('admin.account.index');
    }

    public function dataTable(Request $request){
        if($request->ajax()) {
            $datas = User::select('*');
            return DataTables::of($datas)
            ->addColumn('action', function($row){  
                $btn = '
                        <form id="fd'.$row->id.'" action="'.route("admin.userreg.destroy",$row->id).'" method="POST">
                            <input type="hidden" name="_token" value="' . csrf_token() . '" />
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="d-flex">
                                <button  type="button"  data-id="'.$row->id.'" 
                                                        data-name="'.$row->name.'"
                                                        data-type="'.$row->type_user.'"
                                                        data-email ="'.$row->email.'"
                                                        data-username  ="'.$row->username.'"
                                                        
                                                        data-toggle="tooltip"  data-original-title="Edit"  class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></button>
                                <button  type="button" data-id="'.$row->id.'" data-name="'.$row->name.'" data-toggle="tooltip"  data-original-title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                            <div>
                        </form>
                        ';
                return $btn;
            })
            ->addColumn('password', function($row){
                return '<button  type="button"  
                data-id="'.$row->id.'" 
                data-name="'.$row->name.'"
                data-type="'.$row->type_user.'"
                data-email ="'.$row->email.'"
                data-username  ="'.$row->username.'"
                
                data-toggle="tooltip"  data-original-title="Edit"  class="password btn btn-info shadow btn-xs  me-1" >Change</button>';
            }) 
            ->editColumn('active', function($row) {
                $checked=($row->active == 1)?'checked':'';
                return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
            })
            ->rawColumns(['action','active','password'])   //merender content column dalam bentuk html
            ->escapeColumns()  //mencegah XSS Attack
            ->orderColumn('name',function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->toJson(); 
        }
    }

    public function store(Request $request,User $User){
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email:rfc,dns',
            'username'  => 'min:3|max:255|required|unique:users,username',
            'password'  => 'required',
            'type'      => 'required',
        ]);

        //dd($request->All());
        $input=[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_user'  =>  $request->type
        ];
        $User::create($input);
        return response()->json(['success'=> 'success add users']);
    }

    public function update(Request $request,User $User){
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'sometimes|email:rfc,dns|email|unique:users,email,'.$request->id,
            'username'  => 'min:3|max:255|required|unique:users,username,'.$request->id,
            'type'      => 'required',
        ]);
        $input=[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'type_user'  =>  $request->type
        ];
        $user=$User::find($request->id);
        $user->update($input);
        return response()->json(['success'=> 'success Update users']);
    }

    public function destroy($id,Request $request,User $User){
       

        $User::find($id)->delete();
        return redirect()->route('admin.userreg.index')
                ->with('success','Delete successfully');
    }


    public function password(Request $request,User $User){
        $request->validate([
            'password'      => 'required|max:255',
        ]);
        $input=[
            'password' => Hash::make($request->password),
        ];
        $user=$User::find($request->id);
        $user->update($input);
        return response()->json(['success'=> 'success Update users']);
    }



    public function publish(Request $request,User $User){
        //dd($request->all());
        $id      = (int) $request->id;
        $publish = (int) $request->publish;
        $data=$User::find($id);
        $data->active =$publish;
        $data->save();
        $pesan='Successfully active access login user ';
        if($publish == 0){
            $pesan='Successfully inactive access login user';
        }
        $response=[
            'error' => false,
            'pesan' => $pesan
        ];
        return response()->json($response);


    }

}
