<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        
        return view('home', [
            "title" => "Home" ,
            "posts" => Post::latest()->take(3)->get()
        ]);
     }
}
