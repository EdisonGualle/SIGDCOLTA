<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Residencia>
 */
class ResidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pais' => $this->faker->country,
            'provincia' => $this->faker->state,
            'canton' => $this->faker->city,
            'parroquia' => $this->faker->word,
            'sector' => $this->faker->word,
            'calles' => $this->faker->streetAddress,
            'referencia' => $this->faker->sentence,
            'telefonoDomicilio' => $this->faker->phoneNumber,
            'idEmpleado' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
