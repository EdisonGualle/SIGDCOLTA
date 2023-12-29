<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'idDepartamento';

    protected $fillable = [
        'nombre',
        'descripcion',
        'telefonos',
        'idUnidad',
    ];

    //Relacion Empleado-Departamento
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idDepartamento');
    }


}
