<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;

class AddcategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin/add_category');
    }

    public function create(Request $req)
    {
        # code...
        $nom = $req->input("nom");
        $c = new Categories;
        $c->nom = $nom;
        $c->save();
        return redirect('/categories/liste');
    }

    function liste(){
        $categories = Categories::all();
        return view("admin/liste_categories", ["categories"=>$categories]);
    }
}
