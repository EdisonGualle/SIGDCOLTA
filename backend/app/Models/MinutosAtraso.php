<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutosAtraso extends Model
{
    use HasFactory;

    protected $table = 'minutosatraso';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idRegistroAsistencia',
        'idEmpleado',
        'cantidad_minutos',
        'fecha',
        // Agrega aquí los demás campos de tu tabla cargo
    ];
}
