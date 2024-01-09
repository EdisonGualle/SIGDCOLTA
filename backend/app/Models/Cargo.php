<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $table = 'cargo';
    protected $primaryKey = 'idCargo';

    protected $fillable = [
        'nombre',
        'descripcion',
        'idUnidad',
        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
    //Relacion Empleado-Cargo
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idCargo');
    }
    // Relación con el modelo Unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }

    // Relación con el modelo JerarquiaPermiso
    public function cargosAprobadores()
    {
        return $this->belongsToMany(Cargo::class, 'jerarquiapermisos', 'idCargo', 'idCargoAprobador')
            ->withPivot('id');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'idCargo', 'idCargo');
    }
}
