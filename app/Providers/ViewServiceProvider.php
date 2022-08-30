<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\PostComposer;
use Illuminate\Support\Facades\View;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('includes/top-nav', function ($view) {
            $bdf=\App\Models\Post::where('publish',1)->where('post_type','post')->select('post_title','slug_url')->orderBy('id','desc')->first();
        
            $about=\App\Models\Post::where('publish',1)->where('post_type','about')->select('post_title','slug_url')->orderBy('id','asc')->get();
            $view->with('bdf',$bdf);
            $view->with('about',$about);
        });
    }
}
