<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discapacidad>
 */
class DiscapacidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'tipo' => $this->faker->word,
            'porcentaje' => $this->faker->randomFloat(2, 0, 100), // Genera un porcentaje aleatorio entre 0 y 100
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
