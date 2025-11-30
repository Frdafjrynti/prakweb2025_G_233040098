<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    // Eager Loading (Otomatis memuat data author dan category setiap post diambil)
    protected $with = ['author', 'category'];

    // Relasi ke User (Penulis), kita namakan 'author'
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Fitur Pencarian & Filter (Query Scope)
    public function scopeFilter(Builder $query, array $filters): void
    {
        // 1. Filter Pencarian (Search)
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        // 2. Filter berdasarkan Kategori
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        // 3. Filter berdasarkan Author (Penulis)
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
    }
}