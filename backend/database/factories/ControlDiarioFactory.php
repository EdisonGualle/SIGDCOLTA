<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ControlDiario>
 */
class ControlDiarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fechaControl' => $this->faker->date(),
            'horaEntrada' => $this->faker->time('H:i:s'),
            'horaSalida' => $this->faker->time('H:i:s'),
            'horaEntradaReceso' => $this->faker->time('H:i:s'),
            'horaSalidaReceso' => $this->faker->time('H:i:s'),
            'totalHoras' => $this->faker->randomFloat(2, 1, 8), // Ajusta según tus necesidades
            'idEmpleado' => function () {
                // Puedes personalizar la lógica para obtener un idEmpleado válido
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
