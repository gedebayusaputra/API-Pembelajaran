<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success'=>false,
                'message'=>'Unauthorized'
            ],401);
        }
        $user->tokens()->delete();
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'success'=>true,
            'message'=>'success',
            'user'=>$user,
            'token'=>$token
        ]);
    }
}

