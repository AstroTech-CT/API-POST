<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        
        for ($i = 0; $i < 100; $i++) {
            Comentario::create([
                'contenido' => $faker->paragraph,
                'publicacion_id' => 1, 
                'user_ci' => 99729215, 
            ]);
        }
    }
}
