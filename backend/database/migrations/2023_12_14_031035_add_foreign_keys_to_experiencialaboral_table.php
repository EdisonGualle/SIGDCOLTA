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
        Schema::table('experiencialaboral', function (Blueprint $table) {
            $table->foreign(['idEmpleado'], 'fk_ExperienciaLaboral_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiencialaboral', function (Blueprint $table) {
            $table->dropForeign('fk_ExperienciaLaboral_Empleado1');
        });
    }
};
