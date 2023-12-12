<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstruccionFormal extends Model
{
    use HasFactory;

    protected $table = 'instruccionformal';
    protected $primaryKey = 'idInstruccionFormal';

    protected $fillable = [
        'titulo',
        'fechaRegistro',
        'nivelAcademico',
        'archivo',


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
