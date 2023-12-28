<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    use HasFactory;

    protected $table = 'registroAsistencia';
    protected $primaryKey = 'idRegistro';

    protected $fillable = [
        'idEmpleado',
        'idTipoAsistencia',
        'fechaHora'


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
