<?php

namespace App\Services;

use App\Models\Residencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidenciaService
{
    public function listarResidencias()
    {
        $residencias = Residencia::all();
        return response()->json(['successful' => true, 'data' => $residencias]);
    }

    public function mostrarResidenciaPorId($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $residencia]);
    }

    public function crearResidencia(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'pais' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'canton' => 'required|string|max:255',
            'parroquia' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'calles' => 'required|string|max:255',
            'referencia' => 'required|string|max:255',
            'telefonoDomicilio' => 'required|string|max:255',
            'idEmpleado' => 'required|integer|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la residencia
        $residencia = Residencia::create($request->all());

        return response()->json(['successful' => true, 'data' => $residencia], 201);
    }

    public function actualizarResidencia(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'pais' => 'string|max:255',
            'provincia' => 'string|max:255',
            'canton' => 'string|max:255',
            'parroquia' => 'string|max:255',
            'sector' => 'string|max:255',
            'calles' => 'string|max:255',
            'referencia' => 'string|max:255',
            'telefonoDomicilio' => 'string|max:255',
            'idEmpleado' => 'integer|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        // Actualizar la residencia
        $residencia->update($request->all());

        return response()->json(['successful' => true, 'data' => $residencia]);
    }

    public function eliminarResidencia($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        $residencia->delete();

        return response()->json(['successful' => true, 'message' => 'Residencia eliminada correctamente']);
    }
}
