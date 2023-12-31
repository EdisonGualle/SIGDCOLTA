<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpleadoHasCapasitacion>
 */
class EmpleadoHasCapacitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idEmpleado' => \App\Models\Empleado::inRandomOrder()->first()->idEmpleado,
            'idCapacitacion' => \App\Models\Capacitacion::inRandomOrder()->first()->idCapacitacion,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
