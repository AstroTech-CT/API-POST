<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publicacion;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PublicacionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Publicacion::create([
                'titulo' => $faker->sentence,
                'tematica' => $faker->word,
                'locacion' => $faker->city,
                'contenido' => $faker->paragraph,
                'user_ci' => 99729215, 
            ]);
        }
    }
}
