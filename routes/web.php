<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardHomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardWargaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//php artisan route:list

Route::get('/', [HomeController::class, 'index']);

//closure
Route::get('/about-us', function () {
    return view('about-us', [
        "title" => "About Us"
    ]);
});

//controller
Route::get('/information', [PostController::class, 'index']);

Route::get('/information/{post:slug}', [PostController::class,'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Information Categories',
        'categories' => Category::all()
    ]);
});


Route::get('/program', function () {
    return view('program', [
        "title" => "Program"  
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard',[DashboardHomeController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/informations', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/information/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/database-warga', DashboardWargaController::class)->middleware('auth');

//kalo mau pake kecualian route, gunakan except
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);