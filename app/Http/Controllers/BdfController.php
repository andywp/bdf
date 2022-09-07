<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Post;
use Meta;
use ZipArchive;
class BdfController extends Controller
{
    public function index($slug_url){
        
        $data=\App\Models\Post::where('publish',1)->where('slug_url',$slug_url)->first();
        if(!$data){
            return abort(404);
        }

         Meta::set('title',$data->post_title.'History | BDF');
         Meta::set('description',$data->post_description);
         Meta::remove('image');
         Meta::set('image', asset('images/post/thumb/small/'.$data->post_image));
        return view('FE.bdf.detail', compact('data'));
    }

    public function history(){
        
        Meta::set('title','History | BDF');
        Meta::set('description','Bali Democracy Forum');
         //Meta::remove('image');
         //Meta::set('image', asset('images/post//thumb/small/'.$data->post_image));
         Meta::set('image', asset('images/home-logo.png'));
        
        $data=\App\Models\Post::where('publish',1)->where('post_type','history')->orderBy('id','DESC')->get();
        return view('FE.bdf.history', compact('data'));
    }

    public function gallery(Request $request){
        //dd($request->album);
        Meta::set('title','Gallery | BDF');
        Meta::set('description','Gallery Bali Democracy Forum');

        $album=\App\Models\Album::with('gallery')->where('publish',1)->select('id','album')->orderBy('id','DESC')->get();
        
        
        $video=\App\Models\Video::where('publish',1)->paginate(12);
        //dd($video);

        return view('FE.gallery.index',compact('album','video'));
    }

    public function ipd(){
        Meta::set('title','IPD | BDF');
        Meta::set('description','IMPLEMENTING AGENCY : THE INSTITUTE FOR PEACE AND DEMOCRACY');
        Meta::set('image', asset('images/home-logo.png'));
        return view('FE.ipd');
    }

    public function publication(){
        Meta::set('title','PUBLICATION | BDF');
        Meta::set('description','PUBLICATION Of BDF');
        Meta::set('image', asset('images/home-logo.png'));

        $data=\App\Models\Category::with('download')->where('type','publication')->where('publish',1)->orderBy('id','DESC')->paginate(12);
       
        //$data=\App\Models\Download::Where('category_id',9)->paginate(8);

        return view('FE.publication',compact('data'));
    }

    public function mediaadvisory(){
        Meta::set('title','MEDIA ADVISORY | BDF');
        Meta::set('description','MEDIA ADVISORY Of BDF');
        Meta::set('image', asset('images/home-logo.png'));

        $data=\App\Models\Category::with('download')->where('type','media-advisory')->where('publish',1)->orderBy('id','DESC')->paginate(12);
       
        //$data=\App\Models\Download::Where('category_id',9)->paginate(8);

        return view('FE.mediaadvisory',compact('data'));

    }


    public function download(Request $request){
       // dd($request->all());
        if(!empty($request->download)){
            if(count($request->download) >1 ){
                //dd('asdadad');
                $fileName = 'zip-downloads/downloads'.time().'.zip';    
                $zip      = new \ZipArchive();
                $zip->open($fileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
                
                foreach($request->download as $r){
                    $path =  public_path('download/'.$r);
                    $relativeName = basename($path);
                    $zip->addFile($path, $relativeName);
                }
                $zip->close();
                return response()->download(public_path($fileName));
            }
            
            return response()->download(public_path('download/'.$request->download[0]));

        }
    }

    public function contact(){
        Meta::set('title', 'CONTACT US | BDF');
        Meta::set('description', 'CONTACT US');
        Meta::set('image', asset('images/home-logo.png'));
        return view('FE.contact');
    }



    public function contactsend(Request $request, \App\Models\Contact $contact){
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email:rfc,dns',
            'subject'=> 'required',
            'message'=> 'required|min:5',
        ]);

        $contact::create($request->all());

        return redirect()->route('media')->with('success','Thank you for contacting us');
    }

}
