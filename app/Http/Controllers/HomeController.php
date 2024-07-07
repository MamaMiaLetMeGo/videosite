<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::latest()->take(6)->get(); // Adjust the number as needed
        return view('home', compact('videos'));
    }
}
