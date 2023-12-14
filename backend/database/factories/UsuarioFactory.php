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
            'nombre' => $this->faker->userName,
            'password' => Str::random(10),// Asegúrate de cambiar esto con la lógica adecuada para tu aplicación
            'idRol' => function () {
                return \App\Models\Rol::inRandomOrder()->first()->idRol;
            },
            'idEmpleado' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
