<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoContrato extends Model
{
    use HasFactory;

    protected $table = 'estadocontrato';

    public $timestamp = false;
    protected $primaryKey = 'estadoContrato';
}
