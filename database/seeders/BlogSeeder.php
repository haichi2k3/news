<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        Blog::factory()->count(10)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
    }
}
