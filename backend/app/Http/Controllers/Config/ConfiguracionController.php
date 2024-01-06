<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Services\ConfiguracionService;
use App\Http\Controllers\Controller;

class ConfiguracionController extends Controller
{
    private $configuracionService;

    public function __construct(ConfiguracionService $configuracionService)
    {
        $this->configuracionService = $configuracionService;
    }

    public function obtenerConfiguraciones()
    {
        $configuraciones = $this->configuracionService->obtenerTodas();

        return response()->json(['configuraciones' => $configuraciones]);
    }

    public function obtenerConfiguracionPorClave($clave)
    {
        $configuracion = $this->configuracionService->obtenerPorClave($clave);

        return response()->json(['configuracion' => $configuracion]);
    }

    public function actualizarConfiguracion(Request $request, $clave)
    {
        // Validar los datos si es necesario

        $datos = [
            'valor' => $request->input('valor'),
            'descripcion' => $request->input('descripcion'),
            // Agrega más campos según sea necesario
        ];

        $this->configuracionService->actualizarPorClave($clave, $datos);

        return response()->json(['mensaje' => 'Configuración actualizada correctamente']);
    }
}
