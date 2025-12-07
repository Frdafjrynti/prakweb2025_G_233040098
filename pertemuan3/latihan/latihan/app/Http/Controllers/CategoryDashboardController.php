<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home', ["title" => "Home", "active" => "home"]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Firda Gendut",
        "email" => "firda@gmail.com", // Ganti emailmu
        "image" => "profile.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Dashboard Routes (DILINDUNGI LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // 1. Dashboard Utama (Statistik/Welcome)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Dashboard Posts (CRUD Postingan)
    // URL-nya jadi: /dashboard/posts
    Route::resource('/dashboard/posts', DashboardPostController::class);

    // 3. Admin Categories (CRUD Kategori)
    // URL-nya jadi: /dashboard/categories
    // 'except show' karena biasanya kategori admin tidak butuh halaman detail
    Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

});