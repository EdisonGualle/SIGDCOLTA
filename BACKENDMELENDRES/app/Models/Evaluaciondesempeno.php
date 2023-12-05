<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDesempeno extends Model
{
    use HasFactory;

    protected $table = 'evaluacionDesempeno';
    protected $primaryKey = 'idEvaluacionDesempeno';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'resultado',
        'observaciones'

        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario
}
