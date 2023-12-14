<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
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
            'telefonos' => $this->faker->phoneNumber,
            'descripcion' => $this->faker->sentence,
            'idUnidad' => function () {
                // Puedes personalizar la lógica para obtener un idUnidad válido
                return \App\Models\Unidad::inRandomOrder()->first()->idUnidad;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
