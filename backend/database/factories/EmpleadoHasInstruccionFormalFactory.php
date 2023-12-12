<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpleadoHasInstruccionFormal>
 */
class EmpleadoHasInstruccionFormalFactory extends Factory
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
            'idInstruccionFormal' => \App\Models\InstruccionFormal::inRandomOrder()->first()->idInstruccionFormal,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
