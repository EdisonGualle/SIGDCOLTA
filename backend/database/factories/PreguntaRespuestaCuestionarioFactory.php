<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreguntaRespuestaCuestionario>
 */
class PreguntaRespuestaCuestionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->sentence,
            'respuesta' => $this->faker->text,
            'idCuestionario' => \App\Models\Cuestionario::inRandomOrder()->first()->idCuestionario,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
