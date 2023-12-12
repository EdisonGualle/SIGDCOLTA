<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permiso>
 */
class PermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fechaSolicitud' => $this->faker->date,
            'fechaInicio' => $this->faker->date,
            'fechaFinaliza' => $this->faker->date,
            'tiempoPermiso' => $this->faker->randomDigit,
            'aprobacionJefeInmediato' => $this->faker->boolean,
            'aprobacionTalentoHumano' => $this->faker->boolean,
            'idTipoPermiso' => \App\Models\TipoPermiso::inRandomOrder()->first()->idTipoPermiso,
            'idEmpleado' => \App\Models\Empleado::inRandomOrder()->first()->idEmpleado,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
