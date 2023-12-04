<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'nombre',
        'password',
        'idRol',
        'idEmpleado',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }
}
