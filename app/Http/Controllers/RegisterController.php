<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index', [
            'title' => 'Register',

        ]);
    }

    public function store(Request $request){
        //ambil request, tampilin semua, return
        // return $request->all();

        //unique:table,column, except,id
        $request->validate([
            'username' => 'required|max:255|min:5',
            'name' => ['required', 'min:1','max:255', 'unique:users'],
            'nik' => ['required', 'digits:16', 'unique:users', 'numeric'],
            'email' => ['required','email:dns','unique:users'],
            'telephone' => ['required','min:11','max:13','numeric'],
            'pass' => ['required', 'min:5','max:255']
        ]);

        dd('berhasil');
    }
}
