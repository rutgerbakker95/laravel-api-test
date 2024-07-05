<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\User;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the BlogPost database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            if (!empty($userIds)) {
                BlogPost::create([
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph,
                    'user_id' => $faker->randomElement($userIds),
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }
    }
}
