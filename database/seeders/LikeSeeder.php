<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like_Publicacion; 
use App\Models\Publicacion; 
use App\Models\User; 
use Faker\Factory as Faker;

class LikeSeeder extends Seeder
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
            Like_Publicacion::create([
                'publicacion_id' => $publicacionIds->random(),
                'user_ci' => 99729215,
            ]);
        }
    }
}
