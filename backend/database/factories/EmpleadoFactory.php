<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cedula' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'fechaNacimiento' => $this->faker->date,
            'Genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'telefonoPersonal' => $this->faker->phoneNumber,
            'telefonoTrabajo' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'etnia' => $this->faker->randomElement(['Mestizo', 'Indígena', 'Afroecuatoriano', 'Montubio', 'Blanco']),
            'estadoCivil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']),
            'tipoSangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'nacionalidad' => $this->faker->country,
            'provinciaNacimiento' => $this->faker->state,
            'ciudadNacimiento' => $this->faker->city,
            'cantonNacimiento' => $this->faker->citySuffix,
            'idDepartamento' => \App\Models\Departamento::factory(), // Asegúrate de tener definida la factoría para Departamento
            'idCargo' => \App\Models\Cargo::inRandomOrder()->first()->idCargo,
            'idEstado' => \App\Models\Estado::inRandomOrder()->first()->idEstado,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
