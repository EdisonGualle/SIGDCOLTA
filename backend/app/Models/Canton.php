<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;
    protected $table = 'canton';
    protected $primaryKey = 'id_canton';

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    protected $fillable = [
        'nombre_canton',
        'id_provincia'
        // Agrega aquí los demás campos de tu tabla provincia
    ];
    
}
