<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Post::factory()
            ->count(50)
            ->create();

        // DB::table('posts')->insert([
        //     'name' => Str::random(10),
        //     'text' => Str::random(10),
        //     'description' => Str::random(10),
        // ]);
    }
}
