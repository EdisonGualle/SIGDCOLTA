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
        Schema::create('empleado_has_instruccionformal', function (Blueprint $table) {
            $table->integer('idEmpleado');
            $table->integer('idInstruccionFormal')->index('fk_Empleado_has_instruccionFormal_instruccionFormal1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();

            $table->primary(['idEmpleado', 'idInstruccionFormal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_has_instruccionformal');
    }
};
