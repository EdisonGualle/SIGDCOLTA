<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    protected $primaryKey = 'idContrato';

    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'monto',
        'idUsuario', // Este campo representa la relación con el modelo Usuario
        'idCargo',   // Este campo representa la relación con el modelo Cargo
        // Agrega aquí los demás campos de tu tabla contrato
    ];

    // Define las relaciones con otras entidades si es necesario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'idCargo');
    }
}
