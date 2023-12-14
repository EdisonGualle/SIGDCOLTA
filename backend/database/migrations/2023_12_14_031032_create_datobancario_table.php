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
        Schema::create('datobancario', function (Blueprint $table) {
            $table->integer('idDatoBancario', true);
            $table->string('nombreBanco', 145)->nullable();
            $table->string('numeroCuenta', 45)->nullable();
            $table->string('tipoCuenta', 45)->nullable();
            $table->integer('idEmpleado')->index('fk_DatosBancarios_Empleado1');
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datobancario');
    }
};
