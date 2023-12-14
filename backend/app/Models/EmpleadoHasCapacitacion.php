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

    // Puedes definir relaciones con otras entidades si es necesario
}
