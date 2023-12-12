<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstruccionFormal>
 */
class InstruccionFormalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'fechaRegistro' => $this->faker->date,
            'nivelAcademico' => $this->faker->randomElement(['Bachillerato', 'Licenciatura', 'Maestría', 'Doctorado']),
            'archivo' => $this->faker->word, // Puedes ajustar esto según tus necesidades.
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
