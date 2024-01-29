<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencialaboral extends Model
{
    use HasFactory;

    protected $table = 'referencialaboral';
    protected $primaryKey = 'idReferenciaLaboral';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'idExperienciaLaboral',


    ];

    // Define las relaciones con otras entidades si es necesario
}
