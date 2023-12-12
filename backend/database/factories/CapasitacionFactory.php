<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capasitacion>
 */
class CapasitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence,
            'descripcion' => $this->faker->sentence,
            'tipoEvento' => $this->faker->word,
            'institucion' => $this->faker->company,
            'cantidadHoras' => $this->faker->randomNumber(2),
            'fecha' => $this->faker->date,
            'archivo' => $this->faker->word . '.pdf', // Puedes ajustar según el formato de tu archivo
        ];
    }
}
