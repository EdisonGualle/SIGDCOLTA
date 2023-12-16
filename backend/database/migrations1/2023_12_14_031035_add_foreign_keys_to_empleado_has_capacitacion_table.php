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
        Schema::table('empleado_has_capacitacion', function (Blueprint $table) {
            $table->foreign(['idEmpleado'], 'fk_Empleado_has_capacitacion_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idCapacitacion'], 'fk_Empleado_has_capacitacion_capacitacion1')->references(['idCapacitacion'])->on('capacitacion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado_has_capacitacion', function (Blueprint $table) {
            $table->dropForeign('fk_Empleado_has_capacitacion_Empleado1');
            $table->dropForeign('fk_Empleado_has_capacitacion_capacitacion1');
        });
    }
};
