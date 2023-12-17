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
        Schema::table('referencialaboral', function (Blueprint $table) {
            $table->foreign(['idExperienciaLaboral'], 'fk_ReferenciaLaboral_ExperienciaLaboral1')->references(['idExperienciaLaboral'])->on('experiencialaboral')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referencialaboral', function (Blueprint $table) {
            $table->dropForeign('fk_ReferenciaLaboral_ExperienciaLaboral1');
        });
    }
};
