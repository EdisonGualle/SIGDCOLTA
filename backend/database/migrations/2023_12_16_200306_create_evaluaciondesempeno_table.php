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
        Schema::create('evaluaciondesempeno', function (Blueprint $table) {
            $table->integer('idEvaluacionDesempeno', true);
            $table->integer('idEmpleado')->nullable()->index('evaluaciondesempeno_ibfk_1');
            $table->integer('idEvaluador')->nullable()->index('evaluaciondesempeno_ibfk_2');
            $table->date('fechaEvaluacion')->nullable();
            $table->text('ObjetivosMetas')->nullable();
            $table->decimal('cumplimientoObjetivos', 5)->nullable();
            $table->text('competencias')->nullable();
            $table->decimal('calificacionGeneral', 5)->nullable();
            $table->text('comentarios')->nullable();
            $table->text('areasMejora')->nullable();
            $table->text('reconocimientosLogros')->nullable();
            $table->text('desarrolloProfesional')->nullable();
            $table->text('feedbackEmpleado')->nullable();
            $table->string('estadoEvaluacion', 50)->nullable();
            $table->string('archivo', 150)->nullable();
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
        Schema::dropIfExists('evaluaciondesempeno');
    }
};
