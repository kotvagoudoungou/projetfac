<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Fakenews;
use DB;
class AjouterController extends Controller
{
    //

    public function index()
    {
    	$categories = Categories::all();
        return view('ajouterfakenews', ['categories'=>$categories]);
    }

    public function create(Request $req)
    {
        //
        $user = Auth::user();
        $v = 0;
        if ($user->status == 'Admin') {
            # code...
            $v = 1;
        }
        $n = new Fakenews;
        $n->source = $req->input("source");
        $n->contenu = $req->input("description");
        $n->categorie_id = $req->input("categorie");
        $n->titre = $req->input("nom");
        $n->user_id = $user->id;
        $n->verifier = $v;
        $n->save();
        return redirect("home");
        //print_r($req->input());
    }

}
