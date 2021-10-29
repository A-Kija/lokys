<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;
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
        
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);
        
        foreach(range(1, 20) as $_) {
            $name = $faker->firstName;
            $surname = $faker->lastName;
            DB::table('authors')->insert([
                 'name' => $name,
                 'surname' => $surname,
                 'photo' => rand(0, 4) ? $faker->imageUrl(200, 250, $name.' '.$surname, false) : null
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

        foreach(range(1, 100) as $id) {
            if (!rand(0, 4)) {
                continue;
            }
            foreach(range(1, rand(1, 8)) as $_) {
                DB::table('book_photos')->insert([
                    'photo' => $faker->imageUrl(200, 250, 'ID: '.$id, false),
                    'book_id' => $id
                ]);
            }
        }

        foreach(range(1, 15) as $_) {
            DB::table('tags')->insert([
                'name' => $faker->streetName,
            ]);
        }




    }
}

