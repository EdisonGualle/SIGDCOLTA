<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fechaInicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fechaFin' => $this->faker->dateTimeBetween('now', '+1 year'),
            'idTipoContrato' => function () {
                // Puedes personalizar la lógica para obtener un idTipoContrato válido
                return \App\Models\TipoContrato::inRandomOrder()->first()->idTipoContrato;
            },
            'idEmpleado' => function () {
                // Puedes personalizar la lógica para obtener un idEmpleado válido
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
