<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoAsistencia extends Model
{
    use HasFactory;

    protected $table = 'estadoasistencia';

    public $timestamp = false;
    protected $primaryKey = 'estadoAsistencia';

   
}
