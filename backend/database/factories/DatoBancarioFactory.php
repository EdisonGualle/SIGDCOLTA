<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatoBancario>
 */
class DatoBancarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreBanco' => $this->faker->company,
            'numeroCuenta' => $this->faker->bankAccountNumber,
            'tipoCuenta' => $this->faker->randomElement(['Ahorros', 'Corriente']),
            'idEmpleado' => function () {
                // Puedes personalizar la lógica para obtener un idEmpleado válido
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
