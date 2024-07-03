<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Books;

class BooksSeeder extends Seeder
{
    /**
     * Run the Books database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Books::create([
                'author' => $faker->name,
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'published_at' => $faker->date,
            ]);
        }
    }
}
