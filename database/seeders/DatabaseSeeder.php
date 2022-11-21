<?php

namespace Database\Seeders;

use App\Models\campeonato;
use App\Models\categoria;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use App\Models\jugador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',

            'password' => bcrypt('admin12345')
        ]);
        //categoria::factory(5)->create();
        //campeonato::factory(3)->create();
        //equipoClub::factory(10)->create();
        //jugador::factory(20)->create();
        //Inscripcion::factory(20)->create();
        $cat1 = categoria::factory()->create([
            'name' => 'Primeras de honor'
        ]);
        $cat2 = categoria::factory()->create([
            'name' => 'Primeras de Ascenso'
        ]);
        $cat3 = categoria::factory()->create([
            'name' => 'Segundas de Ascenso'
        ]);
        $cat4 = categoria::factory()->create([
            'name' => 'Primeras senior'
        ]);
    }
}
