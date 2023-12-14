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
        Schema::create('instruccionformal', function (Blueprint $table) {
            $table->integer('idInstruccionFormal', true);
            $table->string('titulo', 145)->nullable();
            $table->date('fechaRegistro')->nullable();
            $table->string('nivelAcademico', 45)->nullable();
            $table->string('archivo', 145)->nullable();
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
        Schema::dropIfExists('instruccionformal');
    }
};
