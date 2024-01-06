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
        Schema::table('permiso', function (Blueprint $table) {
            $table->foreign(['idEmpleado'], 'fk_Permisos_Empleado1')->references(['idEmpleado'])->on('empleado')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idTipoPermiso'], 'fk_Permisos_TiposPermisos1')->references(['idTipoPermiso'])->on('tipopermiso')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permiso', function (Blueprint $table) {
            $table->dropForeign('fk_Permisos_Empleado1');
            $table->dropForeign('fk_Permisos_TiposPermisos1');
        });
    }
};
