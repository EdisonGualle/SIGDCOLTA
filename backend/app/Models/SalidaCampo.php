<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaCampo extends Model
{
    use HasFactory;

    protected $table = 'salidacampo';
    protected $primaryKey = 'idSalidaCampo';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'fecha',
        'horaSalida',
        'horaLlegada',
        'aprobacionJefeInmediato',
        'aprobacionTalentoHumano',
        'idEmpleado',
        'idTipoSalida'


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
