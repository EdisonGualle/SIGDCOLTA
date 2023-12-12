<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpleadoHasEvaluacionDesempeno>
 */
class EmpleadoHasEvaluacionDesempenoFactory extends Factory
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
            'idEvaluacionDesempeno' => \App\Models\EvaluacionDesempeno::inRandomOrder()->first()->idEvaluacionDesempeno,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
