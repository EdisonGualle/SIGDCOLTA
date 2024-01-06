<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalidaCampo>
 */
class SalidaCampoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date,
            'horaSalida' => $this->faker->time,
            'horaLlegada' => $this->faker->time,
            'aprobacionJefeInmediato' => $this->faker->boolean,
            'aprobacionTalentoHumano' => $this->faker->boolean,
            'idEmpleado' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'idTipoSalida' => function () {
                return \App\Models\TipoSalida::inRandomOrder()->first()->idTipoSalida;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
