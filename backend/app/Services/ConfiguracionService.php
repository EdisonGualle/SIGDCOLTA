<?php

namespace App\Services;

use App\Models\Configuracion;

class ConfiguracionService
{
    public function obtenerTodas()
    {
        return Configuracion::all();
    }

    public function obtenerPorClave($clave)
    {
        return Configuracion::where('clave', $clave)->first();
    }

    public function actualizarPorClave($clave, $datos)
    {
        $configuracion = Configuracion::where('clave', $clave)->firstOrFail();
        $configuracion->update($datos);
    }

    private function obtenerTiempoCierreSesion()
    {
        return Configuracion::where('clave', 'tiempo_cierre_sesion')->value('valor');
    }


    // Puedes agregar más funciones según sea necesario
}
