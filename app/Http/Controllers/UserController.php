<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index( $id=0)
    {
        $user = user::all
                
        return view("admin/liste_user", ['user'=>$user]);
    }
}
