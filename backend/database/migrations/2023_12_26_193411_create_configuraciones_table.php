<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id('idConfiguracion');
            $table->string('clave')->unique();
            $table->string('valor');
            $table->text('descripcion')->nullable();
            $table->timestamps(); // Agrega created_at y updated_at

            // Puedes agregar más columnas según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuraciones');
    }
}
