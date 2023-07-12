<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    //
    public function index(){
        //login.index -> login trs masuk ke foldernya dan menuju ke index.
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            //digunakan untuk menghindari session fixation.
            $request->session()->regenerate();
            //intended method akan redirect si user ke url mereka ingin akses sebelum ditahan/intercept oleh otentikasi middleware.
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('loginError','Login failed!');

        // ini akan masuk ke page rendering
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
    
        $request->session()->invalidate();
            //bikin baru session agar tdk dapat dibajak
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}

