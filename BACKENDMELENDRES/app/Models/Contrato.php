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
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'idEmpleado',
        'idTipoContrato',
        // Agrega aquí los demás campos de tu tabla contrato
    ];
}
