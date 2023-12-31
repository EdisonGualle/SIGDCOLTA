<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoBancario extends Model
{
    use HasFactory;

    protected $table = 'datoBancario';
    protected $primaryKey = 'idDatoBancario';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombreBanco',
        'numeroCuenta',
        'tipoCuenta',
        'idEmpleado',
        // Agrega aquí los demás campos de tu tabla cuestionarios
    ];

    // Puedes definir relaciones con otras entidades si es necesario
    //Relacion Empleado-DatosBancarios
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpleado');
    }
}
