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
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->integer('idCapacitacion', true);
            $table->string('nombre', 145)->nullable();
            $table->string('descripcion', 145)->nullable();
            $table->string('tipoEvento', 45)->nullable();
            $table->string('institucion', 145)->nullable();
            $table->integer('cantidadHoras')->nullable();
            $table->date('fecha')->nullable();
            $table->string('archivo', 145)->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacitacion');
    }
};
