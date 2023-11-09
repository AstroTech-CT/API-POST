<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportePublicacion; 
use App\Models\Publicacion; 
use App\Models\User; 
use Faker\Factory as Faker;

class ReportePublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        
        $publicacionIds = Publicacion::pluck('id');

        for ($i = 0; $i < 100; $i++) {
            ReportePublicacion::create([
                'Motivo' => $faker->sentence,
                'publicacion_id' => 300,
                'user_ci' => 99729215,
            ]);
        }
    }
}
