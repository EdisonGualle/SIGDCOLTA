<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permiso';
    protected $primaryKey = 'idPermiso';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'idPermiso',
        'idEmpleado',
        'idTipoPermiso',
        'motivo',
        'fechaSolicitud',
        'fechaInicio',
        'fechaFinaliza',
        'tiempoPermiso',
        'idEstadoPermiso'
    ];

    // Relación con el modelo TipoPermiso
    public function tipoPermiso()
    {
        return $this->belongsTo(TipoPermiso::class, 'idTipoPermiso');
    }

    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }

    // Relación con el modelo AprobacionPermiso
    public function aprobaciones()
    {
        return $this->hasMany(AprobacionPermiso::class, 'idPermiso');
    }

    // Relación con el modelo EstadoPermiso
    public function estadoPermiso()
    {
        return $this->belongsTo(EstadoPermiso::class, 'idEstadoPermiso');
    }
}
