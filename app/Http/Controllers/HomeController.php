<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::latest()->paginate(5);

        if(@Auth::guest()){
            return view('template.home',
            compact('products'))->with('i', (request()->input('page', 1)-1) *5);
        }
        if(Auth::user()->hasRole('user')){
            // return view('userboard',
            // return view('dashboard',
            return view('template.home',
            compact('products'))->with('i', (request()->input('page', 1)-1) *5);
        }elseif(Auth::user()->hasRole('vendor')){
            // return view('plannerboard');
            // return view('dashboard',
            return view('template.home',
            compact('products'))->with('i', (request()->input('page', 1)-1) *5);
        }elseif(Auth::user()->hasRole('administrator')){
            // return view('adminboard');
        }elseif(Auth::user()->hasRole('superadministrator')){
            // return view('superadminboard');
        }
        // return view('home');
    }
}
