<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'idDepartamento';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',
        'telefono',
        'idUnidad',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idDepartamento', 'idDepartamento');
    }
}
