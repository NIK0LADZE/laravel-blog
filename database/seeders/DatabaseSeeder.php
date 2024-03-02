<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Jane Doe'
        ]);

        $category = Category::factory()->create([
            'name' => 'Movies',
            'slug' => 'movies'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
    }
}
