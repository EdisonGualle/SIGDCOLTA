<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    protected $primaryKey = 'idContrato';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'fechaInicio',
        'fechaFin',
        'idEmpleado',
        'idTipoContrato',
    ];

    public function empleados()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }

    public function tiposContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'idTipoContrato', 'idTipoContrato');
    }



    //Relacion Empleado-Contratos

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'idTipoContrato');
    }
}
