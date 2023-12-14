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

    // Puedes definir relaciones con otras entidades si es necesario
}
