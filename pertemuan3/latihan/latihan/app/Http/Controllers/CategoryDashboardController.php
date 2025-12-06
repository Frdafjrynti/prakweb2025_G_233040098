<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryDashboardController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::withCount('posts')
            ->when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                      ->orWhere('slug', 'like', '%' . request('search') . '%');
            })
            ->paginate(10);

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.unique' => 'Nama kategori sudah digunakan',
            'slug.unique' => 'Slug sudah digunakan',
        ]);

        // Failure Handling
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Generate slug jika tidak diisi
        $slug = $request->slug ?? Str::slug($request->name);

        // Simpan category
        Category::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        $category->load('posts');
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.unique' => 'Nama kategori sudah digunakan',
            'slug.unique' => 'Slug sudah digunakan',
        ]);

        // Failure Handling
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Generate slug jika tidak diisi
        $slug = $request->slug ?? Str::slug($request->name);

        // Update category
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Cek apakah category memiliki posts
        if ($category->posts()->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki postingan!');
        }

        $category->delete();

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}