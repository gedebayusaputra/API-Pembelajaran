<?php

namespace App\Models;

class Post 
{
    private static $info_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "Judul-pertama",
            "author" => "hehe",
            "body" => "lorem ipsum"
        ],
        [
            "title" => "Judul Pert2",
            "slug" => "Judul-pert2",
            "author" => "hehe2",
            "body" => "lorem ipsum"
        ],
    ];

    public static function all(){
        //pake self:: karena properti statis
        //kalo pake this-> atau panah, maka dia properti biasa
        return collect(self::$info_posts);
    }

    public static function find($slug){
        //penulisan self untuk properties static
        //penulisan static utk method static
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
