<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPermiso extends Model
{
    use HasFactory;
    protected $table = 'estadopermiso';
    protected $primaryKey = 'idEstadoPermiso';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    protected $fillable = [
        'estado'
    ];

    // Relación con el modelo Permiso
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'idEstadoPermiso');
    }

}
