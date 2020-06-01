<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Categories;
use App\Fakenews;
use DB;
class FakesnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('admin/add_fakenews', ["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $user = Auth::user();
        $v = 0;
        if ($user->status == 'Expert') {
            # code...
            $v = 1;
        }
         //print_r($user);die();
        $n = new Fakenews;
        $n->source = $req->input("source");
        $n->contenu = $req->input("description");
        $n->categorie_id = $req->input("categorie");
        $n->titre = $req->input("nom");
        $n->user_id = $user->id;
        $n->verifier = $v;

        $n->save();
        return redirect("/fakenews");
        //print_r($req->input());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        //
        $fakes = DB::table('fakenews')->select('fakenews.*', 'categories.nom')
                ->join("categories", "categories.id", "=", "fakenews.categorie_id")
                ->get();
        return view("admin/liste_fakenews", ['fakes'=>$fakes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function liste($id)
    {
        # code...
       $liste = DB::table('fakenews')->select('fakenews.*', 'categories.nom', "users.name")
                ->join("categories", "categories.id", "=", "fakenews.categorie_id")
                ->join("users", "users.id", "=", "fakenews.user_id")
                ->where('categories.id', $id)
                ->where('users.status' , 'Expert')
                ->get();
        $categories = Categories::all();
        return view("affichagefake", ["categories"=>$categories, 'liste'=>$liste]) ;
    }
}
