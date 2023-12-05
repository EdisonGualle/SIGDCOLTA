<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'idDepartamento';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'telefonos',
        'idUnidad',
    ];

    
}
