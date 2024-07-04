<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPosts;

class BlogPostsSeeder extends Seeder
{
    /**
     * Run the BlogPosts database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            BlogPosts::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'author' => $faker->name,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
