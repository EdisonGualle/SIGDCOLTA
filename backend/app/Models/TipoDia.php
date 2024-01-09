<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDia extends Model
{
    use HasFactory;

    protected $table = 'tipoDia';

    protected $fillable = [
        'tipoDia',
    ];

    // Define las relaciones con otras entidades si es necesario
}
