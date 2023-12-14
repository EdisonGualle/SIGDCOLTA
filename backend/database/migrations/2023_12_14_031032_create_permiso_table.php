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
        Schema::create('permiso', function (Blueprint $table) {
            $table->integer('idPermiso', true);
            $table->date('fechaSolicitud')->nullable();
            $table->string('fechaInicio', 45)->nullable();
            $table->date('fechaFinaliza')->nullable();
            $table->integer('tiempoPermiso')->nullable();
            $table->string('aprobacionJefeInmediato', 45)->nullable();
            $table->string('aprobacionTalentoHumano', 45)->nullable();
            $table->integer('idTipoPermiso')->index('fk_Permisos_TiposPermisos1');
            $table->integer('idEmpleado')->index('fk_Permisos_Empleado1');
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
        Schema::dropIfExists('permiso');
    }
};
