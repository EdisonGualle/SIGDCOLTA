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
        Schema::create('referencialaboral', function (Blueprint $table) {
            $table->integer('idReferenciaLaboral', true);
            $table->string('nombre', 145)->nullable();
            $table->string('apellido', 145)->nullable();
            $table->string('cedula', 11)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 45)->nullable();
            $table->integer('idExperienciaLaboral')->index('fk_ReferenciaLaboral_ExperienciaLaboral1');
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
        Schema::dropIfExists('referencialaboral');
    }
};
