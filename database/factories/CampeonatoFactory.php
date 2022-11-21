<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\campeonato>
 */
class CampeonatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->name(),
            'fecha_inicio'=> $this->faker->date(),
            'fecha_fin'=> $this->faker->date(),
            'descripcion'=>Str::random(10),
            'estado'=> $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 1),
        ];
    }
}
