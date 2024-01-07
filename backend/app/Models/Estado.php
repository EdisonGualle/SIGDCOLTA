<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estadousuario';
    protected $primaryKey = 'idEstado';
    protected $hidden = [
        "updated_at",
        "created_at"
    ];
    
    protected $fillable = [
        'tipoEstado',
        // Agrega aquí los demás campos de tu tabla cargo
    ];
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idEstado', 'idEstado');
    }
    // Define las relaciones con otras entidades si es necesario
}
