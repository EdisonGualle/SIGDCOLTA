<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDesempeno extends Model
{
    use HasFactory;

    protected $table = 'evaluacionDesempeno';
    protected $primaryKey = 'idEvaluacionDesempeno';

    protected $fillable = [
        'idEmpleado',
        'idEvaluador',
        'fechaEvaluacion',
        'ObjetivosMetas',
        'cumplimientoObjetivos',
        'competencias',
        'calificacionGeneral',
        'comentarios',
        'areasMejora',
        'reconocimientosLogros',
        'desarrolloProfesional',
        'feedbackEmpleado',
        'estadoEvaluacion',
        'archivo'
    ];
    protected $hidden = [
        "updated_at",
        "created_at"
    ];


    // Puedes definir relaciones con otras entidades aquí si es necesario

    // También puedes definir accesores, mutadores u otros métodos según sea necesario
    //Relacion Empleado-EvaluacionDesempeno
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
    public function evaluador()
    {
        return $this->belongsTo(Empleado::class, 'idEvaluador');
    }


}
