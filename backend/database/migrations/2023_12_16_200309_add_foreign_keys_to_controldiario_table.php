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
        Schema::table('controldiario', function (Blueprint $table) {
            $table->foreign(['idEmpleado'], 'fk_ControlDiario_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controldiario', function (Blueprint $table) {
            $table->dropForeign('fk_ControlDiario_Empleado1');
        });
    }
};
