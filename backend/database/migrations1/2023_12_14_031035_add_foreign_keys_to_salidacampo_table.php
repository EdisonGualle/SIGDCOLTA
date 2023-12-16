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
        Schema::table('salidacampo', function (Blueprint $table) {
            $table->foreign(['idEmpleado'], 'fk_SalidasCampo_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idTipoSalida'], 'fk_SalidasCampo_TiposSalidas1')->references(['idTipoSalida'])->on('tiposalida')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salidacampo', function (Blueprint $table) {
            $table->dropForeign('fk_SalidasCampo_Empleado1');
            $table->dropForeign('fk_SalidasCampo_TiposSalidas1');
        });
    }
};
