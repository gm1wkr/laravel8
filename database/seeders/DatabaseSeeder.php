<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
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
            'name' => 'Prof. Pompingtom Smythe'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $user = User::factory()->create([
            'name' => 'Dr. Jeffery Munter Jones'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

    }
}
