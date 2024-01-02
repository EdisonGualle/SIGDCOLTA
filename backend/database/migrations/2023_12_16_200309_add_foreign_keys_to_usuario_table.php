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
        Schema::table('usuario', function (Blueprint $table) {
            $table->foreign(['idRol'], 'fk_Usuario_Rol1')->references(['idRol'])->on('rol')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idEmpleado'], 'fk_Usuario_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign('fk_Usuario_Rol1');
            $table->dropForeign('fk_Usuario_Empleado1');
        });
    }
};
