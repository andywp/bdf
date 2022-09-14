<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Download;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use DataTables;
use File;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index(){
        return view('admin.publication.index');
    }

    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = Category::select('id','title','publish','created_at')->where('type','publication');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.publication.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <button type="button"  data-id="'.$row->id.'" data-album="'.$row->title.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></button>
                                            <button  type="submit" data-id="'.$row->id.'" data-album="'.$row->title.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        ->addColumn('file', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <a href="'.route("admin.publication.list",$row->id).'" class="btn btn-outline-info btn-xs">Manage File</a>
                                    ';
                            return $btn;
                        })
                
                        ->editColumn('publish', function($row) {
                            $checked=($row->publish == 1)?'checked':'';
                            return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
                        }) 
                        ->rawColumns(['action','publish','file'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('id',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function store(Request $request,Category $Category){
        $request->validate([
            'title'          => 'required|max:255',
        ]);
        $Category::create(['title' => $request->title ,'type' => 'publication']);
        return response()->json(['success'=>'Publication successfully Saved']);
    }

    public function update(Request $request,Category $Category){
        $request->validate([
            'title'          => 'required|max:255',
        ]);
        $id=(int) $request->id;
        $name= $request->title;
        $data=$Category::find($id);
        $data->title = $name;
        $data->save();
        return response()->json(['success'=>'Publication successfully Updated']);
    }
    public function destroy(Request $request, $id, Category $Category){
        $id =(int) $id;
        $Category::find($id)->delete();
        return redirect()->route('admin.publication.index')
                ->with('success','Delete successfully');
    }

    public function listPublication($id, Category $Category){
        $id=(int) $id;
        $dataAlbum=$Category::find($id);
        return view('admin.publication.list', compact('dataAlbum'));
    }

    public function storeFile(Request $request, Download $Download){
        $file = $request->file('file');
        $originName=str_replace('.'.$file->extension(),'',$file->getClientOriginalName());
        //dd( $originName);
        $name=Carbon::now()->format('YmdHis').'-'.$request->category.'.'.$file->extension();
        
        $file_path = public_path('/download/');
        if (!File::exists($file_path)) {
            File::makeDirectory($file_path);
        }
        $file->move($file_path , $name);

        $Download::create([
            'category_id'   => $request->category_id,
            'title'         => $originName,
            'file'          => $name
        ]);
        $response=[
            'error' => false,
            'pesan' => 'Successfully'
        ];
        return response()->json($response);
    }

    public function dataTableFile($id,Request $request){
        if($request->ajax()){
            $datas =Download::select('id','title','file','publish','created_at')->where('category_id',$id);
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.publication.destroyFile",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <button  type="button" data-id="'.$row->id.'" data-title="'.$row->title.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        ->editColumn('title', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                         <input type="text" name="title['.$row->id.']" class="form-control caption" value="'.$row->title.'" data-id="'.$row->id.'" >
                                    ';
                            return $btn;
                        })
                        ->editColumn('file', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            /* $path_video=public_path('/video/'.$row->file);
                            $mimi_type=mime_content_type($path_video);
                            $url_video='';

                            $cover=empty($row->cover)?asset('assets/images/default-video.png'):asset('video/cover/'.$row->file); */
                            $url=asset('download/'.$row->file);

                            $html='
                                    <a href="'.$url.'">
                                        <i class="fas fa-file-pdf fa-4x"></i>
                                    </a>
                                ';

                           
                            return $html;
                        })
                        ->rawColumns(['action','file','title'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->order(function ($query) {
                            $query->orderBy('id', 'DESC');
                        })
                        ->toJson();

        }
    }

    public function destroyFile($id,Request $request,Download $Download){
        $data=$Download::find($id);
        $file=$data->images;
        $file_path = public_path('/download/'.$file);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $data->delete();

        return response()->json(['success'=>'File has deleted','id' => $id ]);

    }

    public function updateFile(Request $request,Download $Download){
        foreach($request->title as $k=>$v){
            $update=$Download::find($k);
            $update->title = $v;
            $update->save();
        }

        return response()->json(['success'=> 'Update has Update']);

    }

    

}
