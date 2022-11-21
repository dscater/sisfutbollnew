<?php

namespace Database\Factories;


use App\Models\campeonato;
use App\Models\equipoClub;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscripcion>
 */
class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'campeonato_id' => campeonato::inRandomOrder()->first()->id,
            'equipo_id' => equipoClub::inRandomOrder()->first()->id,
            'observacion' => Str::random(8),
        ];
    }
}
