<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    protected $table = 'capasitacion';
    protected $primaryKey = 'idCapasitacion';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'tipoEvento',
        'lugar',
        'institucion',
        'cantidadHoras',
        'archivo',
        // Agrega aquí los demás campos de tu tabla capacitacion
    ];

    // Define las relaciones con otras entidades si es necesario
}
