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
        Schema::table('contrato', function (Blueprint $table) {
            $table->foreign(['idTipoContrato'], 'fk_Contrato_TipoContrato1')->references(['idTipoContrato'])->on('tipocontrato')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idEmpleado'], 'fk_Contrato_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato', function (Blueprint $table) {
            $table->dropForeign('fk_Contrato_TipoContrato1');
            $table->dropForeign('fk_Contrato_Empleado1');
        });
    }
};
