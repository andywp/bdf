<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;


class StudentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.student.index');
    }

    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = User::select('id','name','username','email','phone');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.student.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <a href="'.route("admin.student.edit",$row->id).'" data-id="'.$row->id.'" data-toggle="tooltip"  data-original-title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></a>
                                            <button  type="button" data-id="'.$row->id.'" data-name="'.$row->name.'" data-toggle="tooltip"  data-original-title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        ->rawColumns(['action'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('name',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function create(){
        return view('admin.student.create');
    }

    public function store(Request $request,User $user){
        $request->validate([
            'name'      => 'required|min:3|max:255',
            'username'  => 'min:4|max:255|required|unique:users,username',
            'email'     => 'required|email:rfc,dns|email|unique:users,email',
            'alamat'    => 'required',
            'date_of_brith' => 'required|date',
            'phone'     => 'required|min:8|max:14',
            'password'=>'required|min:6|max:30',
            're-password'=>'required|min:6|max:30|same:password'
        ]);
        $user::create($request->all());
        return redirect()->route('admin.student.index')
                        ->with('success','Student created successfully.');
    }


    public function edit($id,User $user){
        $id=(int)$id;
        $data=$user::find($id);
        return view('admin.student.edit', compact('data'));
    }


    public function update(Request $request, $id, User $user){
        $request->validate([
            'name'      => 'required|min:3|max:255',
            'username'  => 'min:4|max:255|sometimes|required|unique:mentors,username,'.$id,
            'email'     => 'sometimes|email:rfc,dns|email|unique:mentors,email,'.$id,
            'alamat'    => 'required',
            'date_of_brith' => 'required|date',
            'phone'     => 'required'
        ]);
        $id =(int) $id;
        $update=$user::find($id);
        $update->name =  $request->name;
        $update->username =  $request->username;
        $update->email =  $request->email;
        $update->alamat =  $request->alamat;
        $update->phone =  $request->phone;
        $update->save();
        //$mentor->update($request->only('name', 'username', 'email','alamat','date_of_brith','phone'));
        return redirect()->route('admin.student.index')
                        ->with('success','Data student updated successfully');
    }

    public function destroy(Request $request, $id, User $user){
        // dd($request->all());
         $id =(int) $id;
         $user::find($id)->delete();
         return redirect()->route('admin.student.index')
                 ->with('success','Delete successfully');
     }
}
