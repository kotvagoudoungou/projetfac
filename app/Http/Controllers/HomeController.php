<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        if(($user->status == "Admin")||($user->status== "collector"))
            return view('home_admin');
            
        else{

            $categories = Categories::all();
            return view('home', ["categories"=>$categories]);
        }
        if($user == "Expert")
                return view('vue_expert');
    }
}
