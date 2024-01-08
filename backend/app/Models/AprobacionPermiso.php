<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprobacionPermiso extends Model
{
    use HasFactory;

    protected $table = 'aprobacionpermiso';
    protected $primaryKey = 'idAprobacionSolicitud';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    protected $fillable = [
        'idPermiso',
        'idEmpleadoAprobador',
        'nivelAprobacion',
        'fechaDecision',
        'motivoRechazo',
        'idEstadoPermiso'
    ];

    // Relación con el modelo Permiso
    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'idPermiso');
    }

    // Relación con el modelo Empleado
    public function empleadoAprobador()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleadoAprobador');
    }

    // Relación con el modelo EstadoPermiso
    public function estadoPermiso()
    {
        return $this->belongsTo(EstadoPermiso::class, 'idEstadoPermiso');
    }

}
