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
        Schema::table('empleado', function (Blueprint $table) {
            $table->foreign(['idCargo'], 'fk_Empleado_Cargo1')->references(['idCargo'])->on('cargo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idEstado'], 'fk_Empleado_Estado1')->references(['idEstado'])->on('estado')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idDepartamento'], 'fk_Empleado_Departamento1')->references(['idDepartamento'])->on('departamento')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->dropForeign('fk_Empleado_Cargo1');
            $table->dropForeign('fk_Empleado_Estado1');
            $table->dropForeign('fk_Empleado_Departamento1');
        });
    }
};
