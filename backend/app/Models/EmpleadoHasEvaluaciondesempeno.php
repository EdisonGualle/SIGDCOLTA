<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoHasEvaluacionDesempeno extends Model
{
    use HasFactory;

    protected $table = 'empleado_has_evaluaciondesempeno';
/*     protected $primaryKey = [];
 */
    protected $fillable = [
        'idEmpleado','idEvaluacionDesempeno '
    ];

    // Puedes definir relaciones con otras entidades si es necesario

    // Puedes definir relaciones con otras entidades si es necesario
}
