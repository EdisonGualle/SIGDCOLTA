<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExperienciaLaboral>
 */
class ExperienciaLaboralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institucion' => $this->faker->company,
            'telefonoInstitucion' => $this->faker->phoneNumber,
            'areaTrabajo' => $this->faker->word,
            'puesto' => $this->faker->jobTitle,
            'fechaDesde' => $this->faker->date,
            'fechaHasta' => $this->faker->date,
            'actividades' => $this->faker->paragraph,
            'archivo' => $this->faker->word, // Puedes ajustar esto según tus necesidades.
            'idEmpleado' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
