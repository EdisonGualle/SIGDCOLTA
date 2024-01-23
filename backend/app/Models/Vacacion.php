<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    use HasFactory;

    protected $table = 'vacacion';
    protected $primaryKey = 'idVacacion';

    protected $fillable = [
        'idEmpleado',
        'fecha_inicio',
        'fecha_fin',
        'estado'
        // Agrega aquí los demás campos de tu tabla cargo
    ];
}
