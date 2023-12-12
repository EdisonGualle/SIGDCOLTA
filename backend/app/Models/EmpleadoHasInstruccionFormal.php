<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoHasInstruccionformal extends Model
{
    use HasFactory;

    protected $table = 'empleado_has_instrucionformal';
  /*   protected $primaryKey = []; */

    protected $fillable = [
        'idEmpleado','idInstrucionFormal '
    ];

    // Puedes definir relaciones con otras entidades si es necesario
}
