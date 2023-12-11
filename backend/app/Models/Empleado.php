<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';
    public $timestamps = false;
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'Genero',
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

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento', 'idDepartamento');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'idCargo', 'idCargo');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado', 'idEstado');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idEmpleado', 'idEmpleado');
    }

    // Puedes agregar relaciones con otras tablas según sea necesario
}
