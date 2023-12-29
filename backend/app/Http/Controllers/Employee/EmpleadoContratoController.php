<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoContratoController extends Controller
{
    public function listarContratosPorEmpleadoAuth()
    {
        // Obtén al usuario autenticado
        $usuarioAutenticado = Auth::user();

        if (!$usuarioAutenticado) {
            return response()->json(['successful' => false, 'error' => 'Usuario no autenticado'], 401);
        }

        // Obtén el modelo Empleado a través del modelo User
        $empleado = $usuarioAutenticado->empleado;

        // Verifica si el empleado existe
        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtén los contratos realizados por el empleado con detalles del tipo de contrato
        $contratos = $empleado->contratos()->with('tipoContrato')->get();
        $contratosArray = $contratos->map(function ($contrato) {
            return [
                'idContrato' => $contrato->idContrato,
                'fechaInicio' => $contrato->fechaInicio,
                'fechaFin' => $contrato->fechaFin,
                'idTipoContrato' => $contrato->idTipoContrato,
                'idEmpleado' => $contrato->idEmpleado,
                'created_at' => $contrato->created_at,
                'updated_at' => $contrato->updated_at,
            ];
        })->toArray();

        $tipoContratoArray = $contratos->pluck('tipoContrato')->toArray();

        return response()->json([
            'successful' => true,
            'datos' => [
                'empleado' => $empleado->toArray(),
                'contratos' => $contratosArray,
                'tipoContrato' => $tipoContratoArray,
            ],
        ]);
    }
}
