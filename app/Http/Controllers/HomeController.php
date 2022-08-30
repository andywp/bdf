<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider=\App\Models\Slider::where('publish',1)->orderBy('order_slider','ASC')->get();
        $gallery=\App\Models\Gallery::orderBy('id','ASC')->limit(8)->get();
        return view('FE.home', compact('slider','gallery'));
    }
}
