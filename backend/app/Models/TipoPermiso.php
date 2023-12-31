<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPermiso extends Model
{
    use HasFactory;

    protected $table = 'tipopermiso';
    protected $primaryKey = 'idTipoPermiso';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    protected $fillable = [
        'nombre',
        'descripcion',

    ];

    // Relación con el modelo Permiso
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'idTipoPermiso');
    }
}
