<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  RestablecerContraseña extends Model
{
    use HasFactory;

    public $table = 'restablecercontraseña';
    public $timestamps = false;

    protected $primaryKey = 'correo'; // Indica que 'correo' es la clave primaria
    public $incrementing = false; // Indica que la clave primaria no es autoincremental
    protected $keyType = 'string'; // Indica que la clave primaria es de tipo string

    protected $fillable = [
        'correo',
        'token',
        'created_at'
    ];
}