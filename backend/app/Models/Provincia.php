<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table = 'provincia';
    protected $primaryKey = 'id_provincia';

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    protected $fillable = [
        'nombre_provincia'
        // Agrega aquí los demás campos de tu tabla provincia
    ];
    
}
