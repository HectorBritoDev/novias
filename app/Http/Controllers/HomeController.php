<?php

namespace App\Http\Controllers;

use App\Album;
use App\SectorCategory;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = User::where('role', 2)->where('status', 1)->inRandomOrder()->paginate(4);
        $categories = SectorCategory::all();
        $albums = Album::inRandomOrder()->paginate(4);

        return view('home', compact('providers', 'categories', 'albums'));
    }

}
