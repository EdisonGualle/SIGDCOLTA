<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpleadoHasDiscapacidad>
 */
class EmpleadoHasDiscapacidadFactory extends Factory
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
            'idDiscapacidad' => \App\Models\Discapacidad::inRandomOrder()->first()->idDiscapacidad,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
