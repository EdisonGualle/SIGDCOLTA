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
        Schema::create('controldiario', function (Blueprint $table) {
            $table->integer('idControlDiario', true);
            $table->date('fechaControl')->nullable();
            $table->time('horaEntrada')->nullable();
            $table->time('horaSalida')->nullable();
            $table->time('horaEntradaReceso')->nullable();
            $table->time('horaSalidaReceso')->nullable();
            $table->float('totalHoras', 10, 0)->nullable();
            $table->integer('idEmpleado')->index('fk_ControlDiario_Empleado1');
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
        Schema::dropIfExists('controldiario');
    }
};
