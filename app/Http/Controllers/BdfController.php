<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Meta;
class BdfController extends Controller
{
    public function index($slug_url){
        
        $data=\App\Models\Post::where('publish',1)->where('slug_url',$slug_url)->first();
         Meta::set('title',$data->post_title.'History | BDF');
         Meta::set('description',$data->post_description);
         Meta::remove('image');
         Meta::set('image', asset('images/post//thumb/small/'.$data->post_image));
        return view('FE.bdf.detail', compact('data'));
    }

    public function history(){
        
        Meta::set('title','History | BDF');
        Meta::set('description','Bali Democracy Forum');
         //Meta::remove('image');
         //Meta::set('image', asset('images/post//thumb/small/'.$data->post_image));
        $data=\App\Models\Post::where('publish',1)->where('post_type','history')->get();
        return view('FE.bdf.history', compact('data'));
    }

    public function gallery(Request $request){
        //dd($request->album);
        Meta::set('title','Gallery | BDF');
        Meta::set('description','Gallery Bali Democracy Forum');

        $album=\App\Models\Album::where('publish',1)->select('id','album')->orderBy('id','ASC')->get();
        if(!$request->album){
            $albumID=\App\Models\Album::where('publish',1)->select('id','album')->limit(1)->orderBy('id','ASC')->first()->id;
        }else{
            $id=(int) $request->album;
            if(!\App\Models\Album::where('publish',1)->select('id','album')->where('id',$id)->count()){
                return abort(404);
            }else{
                $albumID= $id;
            }
        }
        $gallery=\App\Models\Gallery::where('album_id',$albumID)->get();
        
        $video=\App\Models\Video::where('publish',1)->get();

        return view('FE.gallery.index',compact('album','gallery','albumID','video'));
    }

}
