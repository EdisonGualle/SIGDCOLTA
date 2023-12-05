<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapasidad extends Model
{
    use HasFactory;

    protected $table = 'discapasidad';
    protected $primaryKey = 'idDiscapasidad';
    public $timestamps = false;

    
    protected $fillable = [
        'nombre',
        'tipo',
        'porcentaje',
        // Agrega aquí los demás campos de tu tabla cuestionarios
    ];

    // Puedes definir relaciones con otras entidades si es necesario
}
