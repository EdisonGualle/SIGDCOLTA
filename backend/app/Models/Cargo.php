<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $table = 'cargo';
    protected $primaryKey = 'idCargo';

    protected $fillable = [
        'nombre',
        'descripcion',
        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
