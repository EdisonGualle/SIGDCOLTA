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
        Schema::create('empleado_has_discapacidad', function (Blueprint $table) {
            $table->integer('idEmpleado');
            $table->integer('idDiscapacidad');
            $table->integer('porcentaje');
            $table->string('nivel', 100);
            $table->text('adaptaciones');
            $table->text('notas');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();

            $table->index(['idDiscapacidad', 'idEmpleado'], 'fk_Empleado_has_discapacidad_discapacidad1');
            $table->primary(['idEmpleado', 'idDiscapacidad']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_has_discapacidad');
    }
};
