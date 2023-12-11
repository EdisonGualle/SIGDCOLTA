<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permiso';
    protected $primaryKey = 'idPermiso';
    public $timestamps = false;
    protected $fillable = [
        'fechaSolicitud',
        'fechaInicio',
        'fechaFinaliza',
        'tiempoPermiso',
        'aprobacionJefeInmediato',
        'aprobacionTalentoHumano',
        'idTipoPermiso',
        'idEmpleado'


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
