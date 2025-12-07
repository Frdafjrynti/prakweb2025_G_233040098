<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Tambahan agar aman saat hapus file nanti

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PERBAIKAN: Tambahkan kurung () atau gunakan auth()->user()->id sesuai modul
        $posts = Post::where('user_id', auth()->user()->id);

        // Fitur search
        if (request('search')){
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        // Statistics for dashboard cards
        $totalPosts = Post::where('user_id', auth()->user()->id)->count();
        $postsThisMonth = Post::where('user_id', auth()->user()->id)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $totalCategories = Category::count();

        return view('dashboard.index', [
            'posts' => $posts->paginate(10)->withQueryString(),
            'totalPosts' => $totalPosts,
            'postsThisMonth' => $postsThisMonth,
            'totalCategories' => $totalCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dengan custom messages
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            // Custom Messages
            'title.required' => 'Field Title wajib diisi!',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi!',
            'body.required' => 'Field Content wajib diisi!',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Cek apakah gagal - redirect kembali dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Mengembalikan semua pesan error kembali
                ->withInput();           // Mengirimkan semua data yang sudah diinput (old data)
        }

        // Generate slug dari title
        $slug = Str::slug($request->title);

        // Pastikan slug unique - jika sudah ada, tambahkan angka di belakang
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Handle File upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store file di storage/app/public/post-images
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Create post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath, // simpan path gambar (contoh: post-images/abc123.jpg)
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Pastikan user hanya bisa edit post miliknya sendiri
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Pastikan user hanya bisa update post miliknya sendiri
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input dengan custom messages
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            // Custom Messages
            'title.required' => 'Field Title wajib diisi!',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi!',
            'body.required' => 'Field Content wajib diisi!',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Cek apakah gagal - redirect kembali dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Mengembalikan semua pesan error kembali
                ->withInput();           // Mengirimkan semua data yang sudah diinput (old data)
        }

        // Generate slug dari title jika title berubah
        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);

            // Pastikan slug unique - jika sudah ada, tambahkan angka di belakang
            $originalSlug = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        } else {
            $slug = $post->slug;
        }

        // Handle File upload
        $imagePath = $post->image; // gunakan gambar lama sebagai default

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            // Store file baru di storage/app/public/post-images
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Update post
        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Pastikan user hanya bisa delete post miliknya sendiri
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus gambar jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Hapus post
        $post->delete();

        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully!');
    }
}