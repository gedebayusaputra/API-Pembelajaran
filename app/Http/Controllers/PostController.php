<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    


    //
    public function index(){

       $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('authors')){
            $author = User::firstWhere('username', request('authors'));
            $title = ' by ' . $author->name;
        }

        return view('information', [
            "title" => "All Informations" . $title,
            "posts" => Post::latest()->filter(request(['search', 'category', 'authors']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('informations', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }

}
