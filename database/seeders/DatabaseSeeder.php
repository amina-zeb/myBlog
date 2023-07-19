<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::truncate();
        //Category::truncate();
        //Post::truncate();

        $user = User::factory()->create([
            'name' => 'Amina Zeb'
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id
        ]);
        
        /*$user = User::factory()->create();
        
        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'title' => 'Work post',
            'slug' => 'work-post',
            'category_id' => $work->id,
            'user_id' => $user->id,
            'excerpt' => '<p>Work post excerpt...</p>',
            'body' => '<p>This is my work post.</p>'
        ]);

        Post::create([
            'title' => 'Personal post',
            'slug' => 'personal-post',
            'category_id' => $personal->id,
            'user_id' => $user->id,
            'excerpt' => '<p>Personal post excerpt...</p>',
            'body' => '<p>This is my personal post.</p>'
        ]);*/

        
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
