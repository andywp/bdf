<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Meta;
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
        Meta::set('title', 'BDF');
        Meta::set('description', 'Directorate General of Information and Public Diplomacy, Ministry of Foreign Affairs of Republic of Indonesia');
        Meta::set('image', asset('images/home-logo.png'));

        $slider=\App\Models\Slider::where('publish',1)->orderBy('order_slider','ASC')->get();
        $gallery=\App\Models\Gallery::orderBy('id','ASC')->limit(8)->get();
        $link=\App\Models\ExternalLink::where('publish',1)->orderBy('order_link')->get();
        return view('FE.home', compact('slider','gallery','link'));
    }
}
