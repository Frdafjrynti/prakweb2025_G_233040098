<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

// ==========================
// BAGIAN AUTH (SESUAI MODUL)
// ==========================

// 1. Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// 2. Route Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 3. Route Dashboard (Harus login)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// 4. Route Logout (Harus login)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ==========================
// ROUTE POSTS (DILINDUNGI AUTH)
// ==========================

// Route Posts (harus login)
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route Detail Post (harus login)
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// ==========================
// ROUTE CATEGORIES
// ==========================

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// ==========================
// ROUTE CDASHBOARD POST - HANYA UNTUK YANG SUDAH LOGIN
// ==========================
// Route untuk dashboard posts - hanya untuk yang sudah login
// Menggunakan resource untuk semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

// Create - Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');

// Store - Menyimpan post baru berdasarkan slug
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');

// Show - Menampilkan 1 post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');

// Edit - Form untuk mengedit post
Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.edit');

// Update - Menyimpan perubahan post
Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.update');

// Delete - Menghapus post
Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.destroy');