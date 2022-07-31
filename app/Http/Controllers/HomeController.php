<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestProducts = Product::latest()->take(3)->get();
        return view('home', compact('latestProducts'));
    }
}
