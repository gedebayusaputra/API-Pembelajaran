<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //percobaan 1
    // public function index()
    // {
    //     //karena ini post admin, nanti makenya Post:all()
    //     /*
    //     Semisal mau ambil data di mana, datanya hanya milik si user yang sedang login, maka:
    //     Post::where('user_id',auth()->user()->id)->get();
    //     */
    //     if(Auth::user()->username === "admin"){
    //         return view('dashboard.informations.index',[
    //             'posts' => Post::all()
    //         ]);
    //     } else {
    //         return view('dashboard.informations.index',[
    //             'posts' => Post::where('user_id',auth()->user()->id)->get()
    //         ]);
    //     }
    // }

    // public function index(Request $request)
    // {
    // $sort = $request->query('sort', 'name_asc');
    // $order = $sort === 'name_asc' ? 'asc' : 'desc';

    // $posts = Auth::user()->username === "admin"
    //     ? Post::orderBy('title', $order)->get()
    //     : Post::where('user_id', auth()->user()->id)->orderBy('name', $order)->get();

    // return view('dashboard.informations.index', [
    //     'posts' => $posts,
    //     'sort' => $sort,
    // ]);
    // }
    

    public function index(Request $request)
    {
        $sort = $request->query('sort');
        $columns = ['title', 'category_id', 'user_id', 'created_at', 'updated_at'];

        if (!in_array($sort, $columns)) {
            $sort = 'title'; // Default sort by title if no valid sort parameter is provided
        }

        $order = $request->query('order','asc');
        $icon = $order === 'asc' ? 'bi bi-sort-alpha-down' : 'bi bi-sort-alpha-up';
        //Post::orderBy($sort, $order)->get()
        $posts = Auth::user()->username === "admin"
            ? Post::orderBy($sort, $order)
            : Post::where('user_id', auth()->user()->id)->orderBy($sort, $order);

        // if ($sort === 'created_at') {
        //     $posts->orderBy('created_at', $order);
        // }
        // if ($sort === 'created_at') {
        //     $posts->orderBy('created_at', $order);
        // }

       

        return view('dashboard.informations.index', [
            'posts' => $posts->filter(request(['search']))->paginate(10)->withQueryString() ,
            'sort' => $sort,
            'order' => $order,
            'icon' => $icon,
        ]);
    }

    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.informations.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump die debug
        // return $request->file('image')->store('information-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',

        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('information-images');     
        }


        $validatedData['user_id'] = auth()->user()->id;
        //strip_tags buat ilangin tag html
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),100);

        Post::create($validatedData);

        return redirect('/dashboard/informations')->with('success','New information has been added!');
    }

    /**
     * Display the specified resource.
     */
    //kalo nanti pas dicari gaada, bisa coba cek ke command palette artisan route:list
    public function show(Post $information)
    {
        return view('dashboard.informations.show',[
            'post' => $information
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $information)
    {
        //
        return view('dashboard.informations.edit',[
            'post' => $information,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $information)
    {
        //
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            

        ];

       

        if($request->slug != $information->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('information-images');     
        }

        // $validatedData['user_id'] = auth()->user()->id;
        //strip_tags buat ilangin tag html
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),100);

        Post::where('id', $information->id)->update($validatedData);

        return redirect('/dashboard/informations')->with('success','Information has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $information)
    {
        //
        if($information->image){
            Storage::delete($information->image);
        }
        Post::destroy($information->id);

        return redirect('/dashboard/informations')->with('success','Information has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

