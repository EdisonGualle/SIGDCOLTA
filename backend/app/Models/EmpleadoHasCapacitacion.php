<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoHasCapacitacion extends Model
{
    use HasFactory;

    protected $table = 'empleado_has_capacitacion';

    protected $fillable = [
        'idEmpleado', 
        'idCapacitacion',
        // Agrega aquí los demás campos de tu tabla cuestionarios
    ];

    // Definir la relación con la tabla Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }

    // Definir la relación con la tabla Capacitacion
    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class, 'idCapacitacion', 'idCapacitacion');
    }

    // Puedes definir otras relaciones si es necesario

}
