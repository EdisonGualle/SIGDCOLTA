<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidad';
    protected $primaryKey = 'idUnidad';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',
        'telefono',
        'idDireccion'
        // Agrega aquí los demás campos de tu tabla cargo
    ];


    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'idUnidad');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idUnidad');
    }

    // Relación con el modelo Direccion
    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'idDireccion');
    }
}
