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
        Schema::create('contrato', function (Blueprint $table) {
            $table->integer('idContrato', true);
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->integer('idTipoContrato')->index('fk_Contrato_TipoContrato1');
            $table->integer('idEmpleado')->index('fk_Contrato_Empleado1');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
};
