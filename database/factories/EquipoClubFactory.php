<?php

namespace Database\Factories;

use App\Models\categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\equipoClub>
 */
class EquipoClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),

            'fecha_fund'=> $this->faker->date(),
            'presidente'=> $this->faker->name(),
            'vicepresidente'=> $this->faker->name(),
            'color_camiseta'=> Str::random(5),
            'color_pantalo'=> Str::random(5),
            'color_medias'=> Str::random(5),
            'direccion'=> Str::random(10),
            'celular'=> $this->faker->phoneNumber(),
            'email'=> $this->faker->email(),
            'observacion'=> Str::random(10),
            'estado'=> $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 1),
            'categoria_id' => categoria::inRandomOrder()->first()->id,

        ];
    }
}
