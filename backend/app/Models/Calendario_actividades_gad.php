<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario_actividades_gad extends Model
{
    use HasFactory;

    protected $table = 'calendario_actividades_gad';
    protected $primaryKey = 'idCalendario';
    public $timestamps = false; // Corregir aquí

    protected $fillable = [
        'fecha',
        'tipoDia',
        'descripcion_actividad',
        // Agrega aquí los demás campos de tu tabla cargo
    ];

    // Define las relaciones con otras entidades si es necesario



}
