<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // <-- Jangan lupa import ini

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(4); // Bikin judul palsu 4 kata
        
        return [
            'user_id' => \App\Models\User::factory(), // Otomatis bikin user baru
            'category_id' => \App\Models\Category::factory(), // Otomatis bikin kategori baru
            'title' => $title,
            'slug' => Str::slug($title), // Bikin slug dari judul
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
            'image' => null,
        ];
    }
}