<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario' => $this->faker->userName,
            'password' => Str::random(10),// Asegúrate de cambiar esto con la lógica adecuada para tu aplicación
            'idEmpleado' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
