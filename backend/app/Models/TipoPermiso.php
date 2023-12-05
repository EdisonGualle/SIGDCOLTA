<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPermiso extends Model
{
    use HasFactory;

    protected $table = 'tipopermiso';
    protected $primaryKey = 'idTipoPermiso';

    protected $fillable = [
        'nombre',
        'descripcion',
        
    ];

    // Define las relaciones con otras entidades si es necesario
}
