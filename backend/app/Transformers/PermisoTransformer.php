<?php

namespace App\Transformers;

use App\Models\Permiso;

class PermisoTransformer {
    public static function transform(Permiso $permiso) {
        return [
            'id' => $permiso->idPermiso,
            'fecha' => $permiso->fechaSolicitud,
            'fechaInicio' => $permiso->fechaInicio,
            // ... otros campos ...
        ];
    }

   
    public static function transformCollection($permisos) {
        return array_map(function ($permiso) {
            // Verifica si ya es un objeto Permiso
            if ($permiso instanceof Permiso) {
                return self::transform($permiso);
            } else {
                // Si es un array, intenta crear una instancia de Permiso
                $permisoModel = new Permiso($permiso);
                return self::transform($permisoModel);
            }
        }, $permisos->toArray());
    }
}