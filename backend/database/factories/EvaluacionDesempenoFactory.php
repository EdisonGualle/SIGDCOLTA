<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluacionDesempeno>
 */
class EvaluacionDesempenoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'idEmpleado' => function () {
                // Puedes personalizar la lógica para obtener un idEmpleado válido
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'idEvaluador' => function () {
                return \App\Models\Empleado::inRandomOrder()->first()->idEmpleado;
            },
            'fechaEvaluacion' => $this->faker->date(),
            'ObjetivosMetas' => $this->faker->text,
            'cumplimientoObjetivos' => $this->faker->randomFloat(2, 0, 100),
            'competencias' => $this->faker->text,
            'calificacionGeneral' => $this->faker->randomFloat(2, 0, 100),
            'comentarios' => $this->faker->text,
            'areasMejora' => $this->faker->text,
            'reconocimientosLogros' => $this->faker->text,
            'desarrolloProfesional' => $this->faker->text,
            'feedbackEmpleado' => $this->faker->text,
            'estadoEvaluacion' => $this->faker->randomElement(['Pendiente', 'Aprobada', 'Rechazada']),
        ];
    }
}
