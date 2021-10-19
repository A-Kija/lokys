<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create('lt_LT');
        
        foreach(range(1, 20) as $_) {
            DB::table('authors')->insert([
                 'name' => $faker->firstName,
                 'surname' => $faker->lastName,
            ]);
        }
        
        foreach(range(1, 100) as $_) {
            DB::table('books')->insert([
                'title' => $faker->realText(rand(10, 30), 1),
                'isbn' => $faker->isbn13,
                'pages' => rand(10, 200),
                'about' => $faker->realText(rand(100, 400), rand(1, 4)),
                'author_id' => rand(1, 20)
            ]);
        }




    }
}

