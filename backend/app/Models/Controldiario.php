<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDiario extends Model
{
    use HasFactory;

    protected $table = 'controldiario'; // Nombre de la tabla en la base de datos
    public $timestamps = false;
    protected $fillable = [
        'fechaControl',
        'horaEntrada',
        'horaSalida',
        'horaEntradaReceso',
        'horaSalidaReceso',
        'totalHoras',
        'idEmpleado',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }
}
