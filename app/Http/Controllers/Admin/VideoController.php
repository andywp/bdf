<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use DataTables;
use File;

class VideoController extends Controller
{
    public function index(){

        return view('admin.video.index');
    }

    public function create(){

        return view('admin.gallery.create');
    }


    public function store(Request $request,Category $Category){
        $request->validate([
            'title'          => 'required|max:255',
        ]);

        $Category::create(['title' => $request->title ]);

        return response()->json(['success'=>'Album successfully Saved']);

    }

    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = Category::select('id','title','publish','created_at')->where('type','video');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.video.destroy",$row->id).'" method="POST">
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
                        ->addColumn('video', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <a href="'.route("admin.video.list",$row->id).'" class="btn btn-outline-info btn-xs"> Video List</a>
                                    ';
                            return $btn;
                        })
                
                        ->editColumn('publish', function($row) {
                            $checked=($row->publish == 1)?'checked':'';
                            return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
                        }) 
                        ->rawColumns(['action','publish','video'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('name',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function listVideo($id='', Category $Category){
        $id=(int) $id;
        $dataAlbum=$Category::find($id);
       

        return view('admin.video.list', compact('dataAlbum'));
    }


    public function publish(Request $request, Category $Category){
        $id      = (int) $request->id;
        $publish = (int) $request->publish;
        $data=$Category::find($id);
        $data->publish =$publish;
        $data->save();
        $pesan='Successfully publish Album Video';
        if($publish == 0){
            $pesan='Successfully unpublish Album Video';
        }
        $response=[
            'error' => false,
            'pesan' => $pesan
        ];
        return response()->json($response);
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
        return response()->json(['success'=>'Album successfully Updated']);
    }
    public function destroy(Request $request, $id, Category $Category){
        $id =(int) $id;
        $Category::find($id)->delete();
        return redirect()->route('admin.video.index')
                ->with('success','Delete successfully');
    }

    /**storage video */

    public function storevideo(Request $request, Video $video){
        //dd($request->all());
        $this->validate($request, [
            /* 'title' => 'required|string|max:255', */
            'video' => 'required|file|mimetypes:video/mp4',
        ]);

        $file = $request->file('video');
        $name=Carbon::now()->format('YmdHis').Str::random(3).'.'.$file->extension();
        $video_path = public_path('/video/');
        if (!File::exists($video_path)) {
            File::makeDirectory($video_path);
        }
        $file->move($video_path , $name);

        $video::create([
            'category_id'   => $request->category_id,
            'title'         => $request->title,
            'file'          => $name
        ]);
        $response=[
            'error' => false,
            'pesan' => 'Successfully'
        ];
        return response()->json($response);
    }


    public function dataTableVideo($id='',Request $request){
        if ($request->ajax()) {
            //$datas = \App\Models\Video::select('id','title','file','cover','created_at')->where('category_id',$id);
            $datas = \App\Models\Video::select('id','title','file','cover','created_at');
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
                        ->editColumn('file', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $path_video=public_path('/video/'.$row->file);
                            $mimi_type=mime_content_type($path_video);
                            $url_video='';

                            $cover=empty($row->cover)?asset('assets/images/default-video.png'):asset('video/cover/'.$row->file);


                            $html='
                                    

                                    <video
                                        
                                        class="video-js"
                                        controls
                                        preload="auto"
                                        width="100%"
                                        height="200"
                                        poster="'.$cover.'"
                                        data-setup="{}"
                                    >
                                        <source src="'.asset('video/'.$row->file).'" type="'.$mimi_type.'" />
                                        
                                        <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank"
                                            >supports HTML5 video</a
                                        >
                                        </p>
                                    </video>

                                ';

                           
                            return $html;
                        })
                        ->rawColumns(['action','file','title'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('title',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

}
