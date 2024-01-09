<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JerarquiaPermiso extends Model
{
    use HasFactory;

    protected $table = 'JerarquiaPermiso';
    protected $primaryKey = null; // Ya que la tabla no tiene una clave primaria única

    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'idCargo',
        'idCargoAprobador',
    ];

    // Desactiva la función de incrementar la clave primaria automática
    public $incrementing = false;

    // Definir relaciones si es necesario
    public function cargoSolicitante()
    {
        return $this->belongsTo(Cargo::class, 'idCargo', 'idCargo');
    }

    public function cargoAprobador()
    {
        return $this->belongsTo(Cargo::class, 'idCargoAprobador', 'idCargo');
    }

}
