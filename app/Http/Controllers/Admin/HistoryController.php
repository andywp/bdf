<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
/* Use Image; */
use  Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DataTables;
use File;

class HistoryController extends Controller
{
    private $imagesPath='images/post/';


    public function index(){
        return view('admin.history.index');
    }


    public function create(){
        return view('admin.history.create');
    }

    public function store(Request $request,Post $Post){
       //dd($request->all());
       
       $request->validate([
            'post_title'=> 'required|max:255',
            'post_content'=> 'required',
            'post_description'=> 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag'=> 'nullable|max:255',
        ]);
        
        $post_image='';
        $file = $request->file('post_image');
        if(!empty($file)){
            
            $post_image=\App\Helpers\HelperImages::upload($file,'post');
           // dd($post_image);
        }
        
        

        //dd($request->all());
        $post=[
            'post_title'    => $request->post_title,
            'post_content'  => $request->post_content,
            'post_description' => $request->post_description,
            'post_tag'         => $request->post_tag,
            'post_image'    => $post_image,
            //'slug_url'  => Str::slug($request->post_title,'-'),
            'publish'   => ($request->publish == 1 )?1:0,
            'published_date' => ($request->publish == 1 )?Carbon::now():'',
            'post_type' => 'history',
            'posts_author' => $request->posts_author
        ];

        //dd($post);
        $Post::create($post);
        return redirect()->route('admin.history.index')
                        ->with('success','Post created successfully.');
    }


    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = Post::select('id','post_title','post_image','posts_author','published_date','publish','created_at')->where('post_type','history');;
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.history.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <a href="'.route("admin.history.edit",$row->id).'" data-id="'.$row->id.'" data-toggle="tooltip"  data-original-title="Edit" class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></a>
                                            <button  type="button" data-id="'.$row->id.'" data-name="'.$row->name.'" data-toggle="tooltip"  data-original-title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        /* ->editColumn('post_image', function($row) {
                            $post_images='/images/post/thumb/mini/'.$row->post_image;
                            $image_path = public_path($post_images);
                            $image_url=asset($post_images);
                            if(!File::exists($image_path)){
                                $image_url=asset('assets/images/default.jpg');
                            }

                            return'<div class="admin-img-post">
                                        <img src="'. $image_url.'" class="mini-images">
                                    </div>
                                    ';
                        }) */
                        ->editColumn('publish', function($row) {
                            $checked=($row->publish == 1)?'checked':'';
                            return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
                        }) 
                        ->rawColumns(['action','publish'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('name',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function publish(Request $request, Post $post){
        $id      = (int) $request->id;
        $publish = (int) $request->publish;

        $data=$post::find($id);
        $data->publish =$publish;
        if(empty($data->published_date)){
            $data->published_date = Carbon::now();
        }
        $data->save();

        $pesan='Successfully publish article';
        if($publish == 0){
            $pesan='Successfully unpublish article';
        }

        $response=[
            'error' => false,
            'pesan' => $pesan
        ];

        return response()->json($response);

    }

    public function edit($id,Post $post){
        $data=$post::find($id);
        //dd($data);
        return view('admin.history.edit', compact('data'));
    }

    public function update(Request $request, $id, Post $post){
        $request->validate([
            'post_title'=> 'required|max:255',
            'post_content'=> 'required',
            'post_description'=> 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_tag'=> 'nullable|max:255',
        ]);

        $artikel=$post::find($id);
        $oldImages=$artikel->post_image;
        $artikel->post_title =$request->post_title;
        $artikel->post_description =$request->post_description;
        $artikel->post_content =$request->post_content;
        $artikel->post_tag =$request->post_tag;
        $artikel->publish =$request->publish;

        /* slug url */
        $slug_url=Str::slug($request->post_title);
        if($post::where('slug_url',Str::slug($request->post_title))->where('id','!=',$id)->count()){
            $slug_url.='-1';
        }
        $artikel->slug_url= $slug_url;
        //if(! )

        $file = $request->file('post_image');
        if(!empty($file)){
            $post_image=\App\Helpers\HelperImages::upload($file,'post', $oldImages);
            $artikel->post_image = $post_image;
        }

        $artikel->save();
        return redirect()->route('admin.history.index')
        ->with('success','Data article updated successfully');
    }


    public function destroy(Request $request, $id, Post $post){
         $id =(int) $id;
         $post::find($id)->delete();
         return redirect()->route('admin.history.index')
                 ->with('success','Delete successfully');
     }
}
