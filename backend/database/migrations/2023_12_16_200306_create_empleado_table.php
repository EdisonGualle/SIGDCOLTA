<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->integer('idEmpleado', true);
            $table->string('cedula', 145);
            $table->string('nombre', 11)->nullable();
            $table->string('apellido', 145)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->string('genero', 45)->nullable();
            $table->string('telefonoPersonal', 20)->nullable();
            $table->string('telefonoTrabajo', 20)->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('etnia', 45)->nullable();
            $table->string('estadoCivil', 45)->nullable();
            $table->string('tipoSangre', 45)->nullable();
            $table->string('nacionalidad', 45)->nullable();
            $table->string('provinciaNacimiento', 45)->nullable();
            $table->string('ciudadNacimiento', 45)->nullable();
            $table->string('cantonNacimiento', 45)->nullable();
            $table->integer('idDepartamento')->index('fk_Empleado_Departamento1');
            $table->integer('idCargo')->index('fk_Empleado_Cargo1');
            $table->integer('idEstado')->index('fk_Empleado_Estado1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
};
