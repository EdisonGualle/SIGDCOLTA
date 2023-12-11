<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencialaboral extends Model
{
    use HasFactory;

    protected $table = 'referencialaboral';
    protected $primaryKey = 'idReferenciaLaboral ';

    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'idExperienciaLaboral',


        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
