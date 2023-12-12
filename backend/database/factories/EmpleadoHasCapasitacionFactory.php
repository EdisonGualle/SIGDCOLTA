<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpleadoHasCapasitacion>
 */
class EmpleadoHasCapasitacionFactory extends Factory
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
            'idCapasitacion' => \App\Models\Capasitacion::inRandomOrder()->first()->idCapasitacion,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
