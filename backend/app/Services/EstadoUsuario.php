<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoUsuario extends Model
{
    use HasFactory;

    protected $table = 'estadousuario';
    protected $primaryKey = 'idEstado';

    protected $fillable = [
        'tipoEstado'
        // Agrega aquí los demás campos de tu tabla cargo
    ];
}
