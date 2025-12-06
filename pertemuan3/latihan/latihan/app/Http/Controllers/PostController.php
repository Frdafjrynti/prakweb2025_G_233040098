<?php

namespace App\Http\Controllers;

use App\Models\Post; // <-- Jangan lupa import Model Post ini
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil semua data post dari database
        $posts = Post::with(['author', 'category'])->get();

        // Mengirim data $posts ke view 'posts.blade.php'
        return view('posts', compact('posts'));
    }

    public function show(Post $post) {
        $post->load(['author', 'category']);
        return view('post', compact('post'));
    }
}