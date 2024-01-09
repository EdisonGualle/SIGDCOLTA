<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioEmpleado extends Model
{
    use HasFactory;

    protected $table = 'horarioEmpleado';
    protected $primaryKey = 'idHorario';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    protected $fillable = [
        'idEmpleado',
        'tipoAsistencia',
        'horaDesde',
        "horaHasta"
    ];

  
}
