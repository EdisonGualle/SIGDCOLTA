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
        Schema::create('salidacampo', function (Blueprint $table) {
            $table->integer('idSalidaCampo', true);
            $table->date('fecha')->nullable();
            $table->time('horaSalida')->nullable();
            $table->time('horaLlegada')->nullable();
            $table->string('aprobacionJefeInmediato', 45)->nullable();
            $table->string('aprobacionTalentoHumano', 45)->nullable();
            $table->integer('idEmpleado')->index('fk_SalidasCampo_Empleado1');
            $table->integer('idTipoSalida')->index('fk_SalidasCampo_TiposSalidas1');
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
        Schema::dropIfExists('salidacampo');
    }
};
