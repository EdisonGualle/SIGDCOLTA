<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoHasDiscapacidad extends Model
{
    use HasFactory;

    protected $table = 'empleado_has_discapacidad';

    protected $fillable = [
        'idEmpleado',
        'idDiscapacidad',
        'porcentaje',
        'nivel',
        'adaptaciones',
        'notas',
    ];

    // Definir la relación con la tabla Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }

    // Definir la relación con la tabla Discapacidad 
    public function discapacidad()
    {
        return $this->belongsTo(Discapacidad::class, 'idDiscapacidad', 'idDiscapacidad');
    }


    // Puedes definir relaciones con otras entidades si es necesario
}
