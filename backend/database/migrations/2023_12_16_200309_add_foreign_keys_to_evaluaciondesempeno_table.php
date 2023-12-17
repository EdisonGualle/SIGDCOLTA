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
        Schema::table('evaluaciondesempeno', function (Blueprint $table) {
            $table->foreign(['idEvaluador'], 'evaluaciondesempeno_ibfk_2')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['idEmpleado'], 'evaluaciondesempeno_ibfk_1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluaciondesempeno', function (Blueprint $table) {
            $table->dropForeign('evaluaciondesempeno_ibfk_2');
            $table->dropForeign('evaluaciondesempeno_ibfk_1');
        });
    }
};
