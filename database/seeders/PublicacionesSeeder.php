<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publicaciones')->insert([
            [
                'titulo' => 'Título de la publicación 1',
                'tematica' => 'Tema de la publicación 1',
                'locacion' => 'Locación de la publicación 1',
                'contenido' => 'images/102.jpg', 
                'user_ci' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo' => 'Título de la publicación 2',
                'tematica' => 'Tema de la publicación 2',
                'locacion' => 'Locación de la publicación 2',
                'contenido' => 'images/101.jpg', 
                'user_ci' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);
    }
}
