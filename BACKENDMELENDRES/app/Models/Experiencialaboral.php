<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'experiencialaboral';
    protected $primaryKey = 'idExperienciaLaboral ';
    public $timestamps = false;
    protected $fillable = [
        'institucion',
        'telefonoInstitucion',
        'areaTrabajo',
        'puesto',
        'fechaDesde',
        'fechaHasta',
        'actividades',
        'archivo',
        'idEmpleado',


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
