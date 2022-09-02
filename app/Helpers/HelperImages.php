<?php

namespace App\Helpers;
use File;
Use Image; 
use Carbon\Carbon;
use Illuminate\Support\Str;
class HelperImages{

    public static function upload($file,$path='',$oldfile=''){

        $post_image=Carbon::now()->format('YmdHis').Str::random(3).'.'.$file->extension();
       // dd($post_image);
        $image = Image::make($file);
        /* set Original Images */
       $image_path = public_path('/images/'.$path.'/');
        if (!File::exists($image_path)) {
            File::makeDirectory($image_path);
        }

        if(!empty($oldfile)){
            $oldImages=public_path('/images/'.$path.'/'.$oldfile);
            if(File::exists($oldImages)){
                File::delete($oldImages);
            }
        }


        $ogImage =  $image->save($image_path.$post_image);

        /**thum */
        $getThumbConfig=config('thumb');
        foreach($getThumbConfig as $tName => $pixel){
            /*unlink old delete*/
            if(!empty($oldfile)){
                $oldImages=public_path('/images/'.$path.'/thumb/'.$tName.'/'.$oldfile);
                if(File::exists($oldImages)){
                    File::delete($oldImages);
                }
            }

            $ogImage = Image::make($file);
            $image_path_thumb = $image_path.'/thumb/'.$tName.'/';
            if (!File::exists($image_path_thumb)) {
                File::makeDirectory($image_path_thumb,0777,true);
            }
            $setWidth=$pixel;
            $width = $ogImage->getWidth();
            $height= $ogImage->height();
            $setHeight 		= floor($height*($setWidth/$width));
            $ogImage->resize($setWidth,$setHeight);
            $ogImage->save($image_path_thumb.$post_image);
        }

        return $post_image;
    }


    public static function uploadGallery($file){
        $path='gallery';
        $post_image= $file->getClientOriginalName();
       // dd($post_image);
        $image = Image::make($file);
        /* set Original Images */
       $image_path = public_path('/images/'.$path.'/');
        if (!File::exists($image_path)) {
            File::makeDirectory($image_path);
        }

       /*  if(!empty($oldfile)){
            $oldImages=public_path('/images/'.$path.'/'.$oldfile);
            if(File::exists($oldImages)){
                File::delete($oldImages);
            }
        } */


        $ogImage =  $image->save($image_path.$post_image);

        /**thum */
        $getThumbConfig=config('thumb');
        foreach($getThumbConfig as $tName => $pixel){
            /*unlink old delete*/
           /*  if(!empty($oldfile)){
                $oldImages=public_path('/images/'.$path.'/thumb/'.$tName.'/'.$oldfile);
                if(File::exists($oldImages)){
                    File::delete($oldImages);
                }
            } */

            $ogImage = Image::make($file);
            $image_path_thumb = $image_path.'/thumb/'.$tName.'/';
            if (!File::exists($image_path_thumb)) {
                File::makeDirectory($image_path_thumb,0777,true);
            }
            $setWidth=$pixel;
            $width = $ogImage->getWidth();
            $height= $ogImage->height();
            $setHeight 		= floor($height*($setWidth/$width));
            $ogImage->resize($setWidth,$setHeight);
            $ogImage->save($image_path_thumb.$post_image);
        }

        return $post_image;

    }

    public static function delete($oldfile, $path){
        //$path='gallery';
        $oldImages=public_path('/images/'.$path.'/'.$oldfile);
        if(File::exists($oldImages)){
            File::delete($oldImages);
        }
        
        $getThumbConfig=config('thumb');
        foreach($getThumbConfig as $tName => $pixel){
            $oldImages=public_path('/images/'.$path.'/thumb/'.$tName.'/'.$oldfile);
            if(File::exists($oldImages)){
                File::delete($oldImages);
            }
        }

    }
    public static function deleteGallery($oldfile){
        $path='gallery';
        $oldImages=public_path('/images/'.$path.'/'.$oldfile);
        if(File::exists($oldImages)){
            File::delete($oldImages);
        }
        
        $getThumbConfig=config('thumb');
        foreach($getThumbConfig as $tName => $pixel){
            $oldImages=public_path('/images/'.$path.'/thumb/'.$tName.'/'.$oldfile);
            if(File::exists($oldImages)){
                File::delete($oldImages);
            }
        }

    }

    public static function deleteVideo($oldfile){
        $oldImages=public_path('/video/'.$oldfile);
        if(File::exists($oldImages)){
            File::delete($oldImages);
        }
    }

}