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
            'porcentaje' => $this->faker->randomFloat(2, 0, 100), // Adjust as needed
            'nivel' => $this->faker->randomElement(['Bajo', 'Medio', 'Alto']), // Adjust as needed
            'adaptaciones' => $this->faker->paragraph,
            'notas' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
