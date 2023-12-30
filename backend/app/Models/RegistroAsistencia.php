<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    use HasFactory;

    protected $table = 'registroAsistencia';
    protected $primaryKey = 'idRegistroAsistencia';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    public $timestamps = false;

    protected $fillable = [
        'idEmpleado',
        'tipoAsistencia',
        'estadoAsistencia',
        'descripcion',
        'fecha',
        'hora'

        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
