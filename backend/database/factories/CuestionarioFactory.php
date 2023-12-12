<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuestionario>
 */
class CuestionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence,
            'idEvaluacionDesempeno' => function () {
                // Puedes personalizar la lógica para obtener un idEvaluacionDesempeno válido
                return \App\Models\EvaluacionDesempeno::inRandomOrder()->first()->idEvaluacionDesempeno;
            },
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
