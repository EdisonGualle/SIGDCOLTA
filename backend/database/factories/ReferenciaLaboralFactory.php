<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReferenciaLaboral>
 */
class ReferenciaLaboralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'cedula' => $this->faker->unique()->numerify('##########'),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'idExperienciaLaboral' => \App\Models\ExperienciaLaboral::inRandomOrder()->first()->idExperienciaLaboral,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
