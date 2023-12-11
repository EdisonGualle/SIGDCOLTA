<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaRespuestaCuestionario extends Model
{
    use HasFactory;

    protected $table = 'preguntarespuestacuestionario';
    protected $primaryKey = 'idPreguntaRespuestaCuestionario';

    protected $fillable = [
        'pregunta',
        'respuesta',
        'idCuestionario',


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
