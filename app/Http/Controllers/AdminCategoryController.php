<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // kalo auth()->check, tambahin !. -> !auth()...
        //kalo pake guest, kek biasa aja -> auth()->guest()
        $this->authorize('admin');
        return view('dashboard.categories.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('admin');
        return view('dashboard.categories.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:posts',

        ]);
        
        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success','New category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        $this->authorize('admin');
        return view('dashboard.categories.edit',[
            'post' => $category,
            'categories' => Category::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $rules = [
            'name' => 'required|max:255',

        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success','Category has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $this->authorize('admin');
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success','Information has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
