<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Mentor;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mentor.index');
    }


    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = Mentor::select('id','name','username','email','phone');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.mentor.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <a href="'.route("admin.mentor.edit",$row->id).'" data-id="'.$row->id.'" data-toggle="tooltip"  data-original-title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></a>
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

        return view('admin.mentor.create');
    }


    public function store(Request $request,Mentor $mentor){
        $request->validate([
            'name'      => 'required|min:3|max:255',
            'username'  => 'min:4|max:255|required|unique:mentors,username',
            'email'     => 'required|email:rfc,dns|email|unique:mentors,email',
            'alamat'    => 'required',
            'date_of_brith' => 'required|date',
            'phone'     => 'required|min:8|max:14',
            'password'=>'required|min:6|max:30',
            're-password'=>'required|min:6|max:30|same:password'
        ]);
        $mentor::create($request->all());
        return redirect()->route('admin.mentor.index')
                        ->with('success','Mentor created successfully.');
    }



    public function edit($id,Mentor $mentor){
        $id=(int)$id;
        $data=$mentor::find($id);

        return view('admin.mentor.edit', compact('data'));
    }


    public function update(Request $request, $id, Mentor $mentor){
        $request->validate([
            'name'      => 'required|min:3|max:255',
            'username'  => 'min:4|max:255|sometimes|required|unique:mentors,username,'.$id,
            'email'     => 'sometimes|email:rfc,dns|email|unique:mentors,email,'.$id,
            'alamat'    => 'required',
            'date_of_brith' => 'required|date',
            'phone'     => 'required'
        ]);
        $id =(int) $id;
        $update=$mentor::find($id);
        $update->name =  $request->name;
        $update->username =  $request->username;
        $update->email =  $request->email;
        $update->alamat =  $request->alamat;
        $update->phone =  $request->phone;
        $update->save();
        //$mentor->update($request->only('name', 'username', 'email','alamat','date_of_brith','phone'));
        return redirect()->route('admin.mentor.index')
                        ->with('success','Data Mentor updated successfully');
    }


    public function destroy(Request $request, $id, Mentor $mentor){
       // dd($request->all());
        $id =(int) $id;
        $mentor::find($id)->delete();
        return redirect()->route('admin.mentor.index')
                ->with('success','Delete successfully');
    }


}
