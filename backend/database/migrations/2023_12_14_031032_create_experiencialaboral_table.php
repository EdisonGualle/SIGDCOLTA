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
        Schema::create('experiencialaboral', function (Blueprint $table) {
            $table->integer('idExperienciaLaboral', true);
            $table->string('institucion', 145)->nullable();
            $table->string('telefonoInstitucion', 20)->nullable();
            $table->string('areaTrabajo', 45)->nullable();
            $table->string('puesto', 45)->nullable();
            $table->date('fechaDesde')->nullable();
            $table->date('fechaHasta')->nullable();
            $table->text('actividades')->nullable();
            $table->string('archivo', 145)->nullable();
            $table->integer('idEmpleado')->index('fk_ExperienciaLaboral_Empleado1');
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
        Schema::dropIfExists('experiencialaboral');
    }
};
