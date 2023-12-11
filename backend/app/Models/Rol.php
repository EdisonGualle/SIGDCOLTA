<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'idRol';

    protected $fillable = [
        'nombre',
        

        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
