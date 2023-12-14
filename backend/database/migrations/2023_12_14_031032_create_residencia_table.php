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
        Schema::create('residencia', function (Blueprint $table) {
            $table->integer('idResidencia', true);
            $table->string('pais', 100)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('canton', 100)->nullable();
            $table->string('parroquia', 100)->nullable();
            $table->string('sector', 100)->nullable();
            $table->string('calles', 240)->nullable();
            $table->string('referencia', 240)->nullable();
            $table->string('telefonoDomicilio', 20)->nullable();
            $table->integer('idEmpleado')->index('fk_Residencia_Empleado1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residencia');
    }
};
