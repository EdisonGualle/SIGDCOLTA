<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;

    protected $table = 'residencia';
    protected $primaryKey = 'idResidencia';

    protected $fillable = [
        'direccion',
        'ciudad',
        'pais',
        // Agrega aquí otros campos de la tabla residencia
    ];

    // Puedes definir relaciones con otras entidades aquí
}
