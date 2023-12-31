<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'experiencialaboral';
    protected $primaryKey = 'idExperienciaLaboral';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
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
    //Relacion Empleado-ExperienciaLaboral

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }
}
