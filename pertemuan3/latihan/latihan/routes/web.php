<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// ========================================
// BASIC PAGES ROUTES
// ========================================

// 1. Route Home
Route::get('/', function () {
    return view('home');
});

// 2. Route About
Route::get('/about', function () {
    return view('about');
});

// 3. Route Blog (Dari Latihan) - menggunakan data dari database
Route::get('/blog', function () {
    $posts = \App\Models\Post::latest()->take(6)->get();
    return view('blog', compact('posts'));
})->name('blog.index');

// 4. Route Contact (Dari Latihan)
Route::get('/contact', function () {
    return view('contact');
});

// ========================================
// CONTROLLER ROUTES
// ========================================

// 5. Route Posts (Dari Bagian G - Praktik Data dan Relasi)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// 6. Route Categories (Dari Tugas Praktek)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');