<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    use HasFactory;

    protected $table = 'tipoContrato';
    protected $primaryKey = 'idTipoContrato';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',
        'clausulas',
        'duracionMeses',
        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
