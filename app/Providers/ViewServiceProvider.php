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
        View::composer('includes/external-link', function ($view) {
            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
            $view->with('data','');
        });
    }
}
