<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    
    protected $table = 'capacitacion';
    protected $primaryKey = 'idCapacitacion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipoEvento',
        'institucion',
        'cantidadHoras',
        'fecha',
        // Agrega aquí los demás campos de tu tabla capacitacion
    ];
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_has_capacitacion', 'idCapacitacion', 'idEmpleado');
    }

  
    public function capacitacionesDeEmpleado()
    {
        return $this->belongsToMany(Capacitacion::class, 'empleado_has_capacitacion', 'idEmpleado', 'idCapacitacion');
    }
}
