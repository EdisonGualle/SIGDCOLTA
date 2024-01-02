<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSalida extends Model
{
    use HasFactory;

    protected $table = 'tiposalida';
    protected $primaryKey = 'idTipoSalida';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',
        
    ];

    // Define las relaciones con otras entidades si es necesario
}
