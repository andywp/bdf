<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalLink;
use DataTables;
use File;

class ExternalLinkController extends Controller
{
    public function index(){
        return view('admin.link.index');
    }

    public function store(Request $request,ExternalLink $ExternalLink){
        //dd($request->all());
        $request->validate([
            'url'=> 'nullable|url',
            'title'=> 'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post_image='';
        $file = $request->file('post_image');
        if(!empty($file)){
            $post_image=\App\Helpers\HelperImages::upload($file,'link');
           // dd($post_image);
        }

        $ExternalLink::create(['url' => $request->url ,'title' => $request->title ,'images' => $post_image]);
        return response()->json(['success'=>'External Link successfully Saved']);
    }

    public function dataTable(Request $request){
        if ($request->ajax()) {
            $datas = ExternalLink::select('id','title','url','images','publish','order_link','created_at');
            return DataTables::of($datas)
                        ->addColumn('action', function($row){  
                            //$enc_id = \Crypt::encrypt($row->id);
                            $btn = '
                                    <form id="fd'.$row->id.'" action="'.route("admin.link.destroy",$row->id).'" method="POST">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="d-flex">
                                            <button  type="submit" data-id="'.$row->id.'" data-name="'.$row->title.'" data-bs-toggle="tooltip" data-bs-placement="bottom"  title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        <div>
                                    </form>
                                    ';
                            return $btn;
                        })
                        ->editColumn('images', function($row){  
                          
                            $post_images='/images/link/thumb/mini/'.$row->images;
                            $image_path = public_path($post_images);
                            $image_url=asset($post_images);
                            if(!File::exists($image_path)){
                                $image_url=asset('assets/images/default.jpg');
                            }

                            return'<div class="admin-img-slider">
                                        <img src="'. $image_url.'" class="mini-images">
                                    </div>
                                    ';


                        })
                        ->editColumn('order_link', function($row){  
                            $btn = '
                                         <input type="text" name="input['.$row->id.'][order]" class="form-control caption" value="'.$row->order_link.'" data-id="'.$row->id.'" >
                                    ';
                            return $btn;
                        })
                        ->editColumn('title', function($row){  
                            $btn = '
                                         <input type="text" name="input['.$row->id.'][title]" class="form-control caption" value="'.$row->title.'" data-id="'.$row->id.'" >
                                    ';
                            return $btn;
                        })
                        ->editColumn('url', function($row){  
                            $btn = '
                                         <input type="text" name="input['.$row->id.'][url]" class="form-control caption" value="'.$row->url.'" data-id="'.$row->id.'" >
                                    ';
                            return $btn;
                        })
                        ->editColumn('publish', function($row) {
                            $checked=($row->publish == 1)?'checked':'';
                            return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="sm" data-width="100">';
                        }) 
                        ->rawColumns(['title','action','publish','images','order_link','url'])   //merender content column dalam bentuk html
                        ->escapeColumns()  //mencegah XSS Attack
                        ->orderColumn('id',function ($query, $order) {
                            $query->orderBy('id', $order);
                        })
                        ->toJson();

        }
    }

    public function update(Request $request){
        if ($request->ajax()) {
            //print_r($request->input);

            foreach($request->input as $k=>$v){
                $Slider=ExternalLink::find($k);
                $Slider->title =$v['title'];
                $Slider->url =$v['url'];
                $Slider->order_link =$v['order'];
                $Slider->save();

            }
            return response()->json(['success'=> 'Update External link']);
        }
    }

    public function destroy(Request $request, $id, ExternalLink $ExternalLink){
        $id =(int) $id;
        $data=$ExternalLink::find($id);
        $file=$data->images;

        \App\Helpers\HelperImages::delete($file,'link');
        
        $data->delete();

        return response()->json(['success'=> 'External Link has deleted','id' => $id]);
    }

    public function publish(Request $request, ExternalLink $ExternalLink){
        $id      = (int) $request->id;
        $publish = (int) $request->publish;
        $data=$ExternalLink::find($id);
        $data->publish =$publish;
        $data->save();
        $pesan='Successfully publish External Link';
        if($publish == 0){
            $pesan='Successfully unpublish External Link';
        }
        $response=[
            'error' => false,
            'pesan' => $pesan
        ];
        return response()->json($response);
    }
}
