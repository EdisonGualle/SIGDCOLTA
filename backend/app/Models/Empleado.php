<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'genero',
        'telefonoPersonal',
        'telefonoTrabajo',
        'correo',
        'etnia',
        'estadoCivil',
        'tipoSangre',
        'nacionalidad',
        'provinciaNacimiento',
        'ciudadNacimiento',
        'cantonNacimiento',
        'idDepartamento',
        'idCargo',
        'idEstado',
        // Otros campos necesarios
    ];

    public function capacitacionesDeEmpleado()
    {
        return $this->hasMany(EmpleadoHasCapacitacion::class, 'idEmpleado');
    }


    public function capacitaciones()
    {
        return $this->belongsToMany(Capacitacion::class, 'empleado_has_capacitacion', 'idEmpleado', 'idCapacitacion')
            ->withTimestamps();
    }

    public function discapacidades()
    {
        return $this->belongsToMany(Discapacidad::class, 'empleado_has_discapacidad', 'idEmpleado', 'idDiscapacidad')
            ->withTimestamps();
    }
}
