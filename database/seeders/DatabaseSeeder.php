<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //        $user = User::factory()->create([
        //            'name' => 'Abdul Yakul',
        //        ]);
        //
        //        $category = Category::factory()->create([
        //            'name' => 'Personal',
        //        ]);

        Post::factory(50)->create([
            //            'user_id' => $user->id,
            //            'category_id' => $category->id,
        ]);
    }
}
