<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';
    protected $primaryKey = 'idDireccion';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'idUnidad');
    }

    public function empleados()
{
    return $this->hasManyThrough(Empleado::class, Unidad::class, 'idDireccion', 'idUnidad');
}
}
