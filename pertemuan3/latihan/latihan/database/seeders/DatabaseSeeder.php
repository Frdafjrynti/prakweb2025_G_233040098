<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // =====================================================
        // TUGAS 1: Membuat 5 Users (sesuai tugas praktek)
        // =====================================================
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // =====================================================
        // TUGAS 1: Membuat 2 Category (sesuai tugas praktek)
        // =====================================================
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // =====================================================
        // TUGAS 1: Membuat 10 Posts (sesuai tugas praktek)
        // =====================================================
        Post::factory(10)
            ->recycle(User::all())
            ->recycle(Category::all())
            ->create();
    }
}