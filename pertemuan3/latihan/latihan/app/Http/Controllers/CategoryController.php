<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of all categories.
     * Menampilkan semua kategori dengan jumlah posts
     */
    public function index()
    {
        // Mengambil semua kategori dari database
        // withCount('posts') = menghitung jumlah posts per kategori
        $categories = Category::withCount('posts')->get();

        // Mengirim data categories ke view 'category'
        return view('category', compact('categories'));
    }
}