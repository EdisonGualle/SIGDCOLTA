<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'capacitacion';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'idCapacitacion';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipoEvento',
        'institucion',
        'cantidadHoras',
        'fecha',
        'archivo',
        // Agrega aquí los demás campos de tu tabla capacitacion
    ];

    /**
     * Obtener la colección de empleados asociados a la capacitación.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_has_capacitacion', 'idCapacitacion', 'idEmpleado');
    }

    /**
     * Obtener la colección de capacitaciones asociadas a un empleado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function capacitacionesDeEmpleado()
    {
        return $this->belongsToMany(Capacitacion::class, 'empleado_has_capacitacion', 'idEmpleado', 'idCapacitacion');
    }
}
