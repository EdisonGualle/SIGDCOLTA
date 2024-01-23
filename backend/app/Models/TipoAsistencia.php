<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAsistencia extends Model
{
    use HasFactory;

    protected $table = 'tipoasistencia';
    protected $primaryKey = 'tipoAsistencia';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public $timestamps = false;
    const ATRASADO = 'atrasado';
    const PRESENTE = 'presente';
    const FALTA = 'falta';
    const JUSTIFICADO = 'justificado';




    protected $fillable = [
        'desde',
        'hasta'
        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
