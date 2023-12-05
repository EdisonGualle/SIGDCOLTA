<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $table = 'cuestionarios';
    protected $primaryKey = 'idCuestionario';

    protected $fillable = [
        'pregunta',
        'opcion1',
        'opcion2',
        'opcion3',
        'opcion4',
        'respuesta_correcta',
        // Agrega aquí los demás campos de tu tabla cuestionarios
    ];

    // Puedes definir relaciones con otras entidades si es necesario
}
