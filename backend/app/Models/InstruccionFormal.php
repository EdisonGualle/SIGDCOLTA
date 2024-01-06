<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstruccionFormal extends Model
{
    use HasFactory;
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $table = 'instruccionformal';
    protected $primaryKey = 'idInstruccionFormal';

    protected $fillable = [
        'titulo',
        'fechaRegistro',
        'nivelAcademico',
        'archivo',


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
    //Relacion Empleado-Instruccion Formal
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_has_instruccionformal', 'idInstruccionFormal	', 'idEmpleado');
    }
 
}
