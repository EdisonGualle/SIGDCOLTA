<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    protected $primaryKey = 'idContrato';

    protected $fillable = [
        'fechaInicio',
        'fechaFin',
        'idEmpleado',
        'idTipoContrato',
        // Agrega aquí los demás campos de tabla contrato
    ];



    //funciones de acceso a la bd
    private function contratosActivos()
    {
        return $this->select('contrato.idContrato', 'empleado.nombre AS empleado', 'contrato.fecha_inicio as fechaInicio', 'contrato.fecha_fin as fechaFin', 'tipocontrato.nombre AS tipoContrato')
            ->join('empleado', 'contrato.idEmpleado', '=', 'empleado.idEmpleado')
            ->join('tipocontrato', 'contrato.idTipoContrato', '=', 'tipocontrato.idTipoContrato')
            ->where('contrato.fecha_fin', '>', now())
            ->get();
    }
}
