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
        // $user = User::where('username', 'jane.doe')->first() ?? User::factory()->create([
        //     'username' => 'jane.doe',
        //     'name' => 'Jane Doe'
        // ]);
        $users = User::factory(10)->create();

        // $category = Category::where('name', 'Anime')->first() ?? Category::factory()->create([
        //     'name' => 'Anime',
        //     'slug' => 'anime'
        // ]);
        $categories = Category::factory(18)->create();

        Post::factory(100)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            }
        ]);
    }
}
