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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'category'=>'required',
            'user_id'=>'required',
            'title'=>'required',
            'slug'=>'required'
        ]);
        try {
            $response = Warga::create($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'error'=>$e->getMessage()
            ]);
        }
    }


        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'category'=>'required',
            'user_id'=>'required',
            'title'=>'required',
            'slug'=>'required'
        ]);
        try {
            $response = Warga::find($id);
            $response->update($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'error'=>$e->getMessage()
            ]);
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $result = Warga::find($id);
            $result->delete();
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'dara'=>$result
            ]);
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
