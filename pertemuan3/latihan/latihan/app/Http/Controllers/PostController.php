<?php

namespace App\Http\Controllers;

use App\Models\Post; // <-- Jangan lupa import Model Post ini
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil semua data post dari database
        $posts = Post::all();

        // Mengirim data $posts ke view 'posts.blade.php'
        return view('posts', compact('posts'));
    }
}