<?php

namespace Database\Factories;

use App\Models\equipoClub;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jugador>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'nom'=>Str::random(5),
            'apep'=>Str::random(5),
            'apem'=>Str::random(5),
            'ci'=>$this->faker->phoneNumber(),
            'ci_exp'=>$this->faker->phoneNumber(),
            'fecha_nac'=> $this->faker->date(),
            'lugar_nac'=> $this->faker->date(),
            'nacionalidad'=>Str::random(8),
            'nro_casaca' => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 55),
            'fecha_afi'=> $this->faker->date(),

            'observacion'=>Str::random(5),

            'equipoclub_id' => equipoClub::inRandomOrder()->first()->id,
            'status'=> $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 1),

        ];
    }
}
