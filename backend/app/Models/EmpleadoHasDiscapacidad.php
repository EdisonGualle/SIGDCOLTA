<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoHasDiscapacidad extends Model
{
    use HasFactory;

    protected $table = 'empleado_has_discapasidad';

    protected $fillable = [
        'idEmpleado',
        'idDiscapasidad'
    ];

    // Puedes definir relaciones con otras entidades si es necesario
}
