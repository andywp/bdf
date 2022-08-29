<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

use Illuminate\Support\Str;
use DataTables;
use File;

class GalleryController extends Controller
{
    
    public function index(){

        return view('admin.gallery.index');
    }

    public function create(){

        return view('admin.gallery.create');
    }


    public function store(Request $request,Album $album){
        $request->validate([
            'album'          => 'required|max:255',
        ]);

        $album::create(['album' => $request->album ]);

        return response()->json(['success'=>'Album successfully Saved']);

    }

    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = Album::select('id','album','publish','created_at');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.gallery.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <button type="button"  data-id="'.$row->id.'" data-album="'.$row->album.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></button>
                                            <button  type="submit" data-id="'.$row->id.'" data-album="'.$row->album.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        ->addColumn('photo', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <a href="'.route("admin.gallery.photo",$row->id).'" class="btn btn-outline-info btn-xs"> Photo</a>
                                    ';
                            return $btn;
                        })
                
                        ->editColumn('publish', function($row) {
                            $checked=($row->publish == 1)?'checked':'';
                            return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
                        }) 
                        ->rawColumns(['action','publish','photo'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('name',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function publish(Request $request, Album $post){
        $id      = (int) $request->id;
        $publish = (int) $request->publish;
        $data=$post::find($id);
        $data->publish =$publish;
        $data->save();
        $pesan='Successfully publish Album ';
        if($publish == 0){
            $pesan='Successfully unpublish Album';
        }
        $response=[
            'error' => false,
            'pesan' => $pesan
        ];
        return response()->json($response);
    }

    public function update(Request $request,Album $album){
        $id=(int) $request->id;
        $name= $request->album;
        $data=$album::find($id);
        $data->album = $name;
        $data->save();
        return response()->json(['success'=>'Album successfully Updated']);
    }

    public function edit(){


    }

    public function destroy(Request $request, $id, Album $album){
        $id =(int) $id;
        $album::find($id)->delete();
        return redirect()->route('admin.gallery.index')
                ->with('success','Delete successfully');
    }

    public function photo($id, Album $album){
        $id=(int) $id;
        $dataAlbum=$album::find($id);
       

        return view('admin.gallery.photo', compact('dataAlbum'));
    }

    public function storePhoto(Request $request,\App\Models\Gallery $gallery){
        $albumID=(int) $request->album_id;
        $file = $request->file('file');
        $post_image=\App\Helpers\HelperImages::uploadGallery($file);

        $gallery::create([
            'images' => $post_image,
            'album_id' => $albumID
        ]);
        return response()->json(['success'=>$post_image]);
    }

    public function deletePhoto(Request $request,\App\Models\Gallery $gallery){
        
        if($gallery::where('images',$request->filename)->count()){
            $gallery::where('images',$request->filename)->delete();
            \App\Helpers\HelperImages::deleteGallery($request->filename);
        }

        return $request->filename; 
    }


    public function dataTableGallery($id,Request $request){
        if ($request->ajax()) {
            $datas = \App\Models\Gallery::select('id','title','images','created_at')->where('album_id',$id);
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.gallery.photodestroy",$row->id).'" method="POST">
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
                        ->editColumn('images', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <img src="'.asset('images/gallery/thumb/small/'.$row->images).'"  class="img-thumbnail" >
                                    ';
                            return $btn;
                        })
                        ->rawColumns(['action','images','title'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('name',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function updatePhoto(Request $request,\App\Models\Gallery $gallery){

       
        foreach($request->title as $k=>$v){
            
            $update=$gallery::find($k);
            $update->title = $v;
            $update->save();

        }

        return response()->json(['success'=> 'Update gallery']);
    }

    //return back()->with('success', 'Successfully Delete product addon');


    public function photodestroy($id,Request $request,\App\Models\Gallery $gallery){
        $data=$gallery::find($id);
        $file=$data->images;
        \App\Helpers\HelperImages::deleteGallery($file);

        $data->delete();

        return response()->json(['success'=>'Photo has deleted','id' => $id ]);
        
    }
}
