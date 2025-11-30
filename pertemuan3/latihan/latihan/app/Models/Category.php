<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Mencegah kolom 'id' diisi manual, sisanya boleh (Mass Assignment)
    protected $guarded = ['id'];

    // Relasi: Satu Kategori punya banyak Post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}