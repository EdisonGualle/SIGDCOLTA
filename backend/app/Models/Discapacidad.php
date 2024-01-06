<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    use HasFactory;

    protected $table = 'discapacidad';
    protected $primaryKey = 'idDiscapacidad';

    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        // Agrega aquí los demás campos de tu tabla cuestionarios
    ];

     /**
     * Obtener la colección de empleados asociados a la capacitación.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_has_discapacidad', 'idDiscapacidad', 'idEmpleado');
    }

    /**
     * Obtener la colección de capacitaciones asociadas a un empleado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discapacidadesDeEmpleado()
    {
        return $this->belongsToMany(Discapacidad::class, 'empleado_has_discapacidad', 'idEmpleado', 'idDiscapacidad');
    }

    // Puedes definir relaciones con otras entidades si es necesario
}
