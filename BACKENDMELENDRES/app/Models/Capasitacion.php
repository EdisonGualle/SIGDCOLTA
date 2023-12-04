<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    protected $table = 'capacitacion';
    protected $primaryKey = 'idCapacitacion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        // Agrega aquí los demás campos de tu tabla capacitacion
    ];

    // Define las relaciones con otras entidades si es necesario
}
