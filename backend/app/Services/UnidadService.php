<?php

namespace App\Services;

use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnidadService
{
    public function listarUnidades()
    {
        $unidades = Unidad::all();
        return response()->json(['successful' => true, 'data' => $unidades]);
    }

    public function mostrarUnidadPorId($id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['successful' => false, 'error' => 'Unidad no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $unidad]);
    }

    public function crearUnidad(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:unidad',
            'descripcion' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la unidad
        $unidad = Unidad::create($request->all());

        return response()->json(['successful' => true, 'data' => $unidad], 201);
    }

    public function actualizarUnidad(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:unidad,nombre,' . $id . ',idUnidad',
            'descripcion' => 'string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['successful' => false, 'error' => 'Unidad no encontrada'], 404);
        }

        // Actualizar la unidad
        $unidad->update($request->all());

        return response()->json(['successful' => true, 'data' => $unidad]);
    }

    public function eliminarUnidad($id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['successful' => false, 'error' => 'Unidad no encontrada'], 404);
        }

        $unidad->delete();

        return response()->json(['successful' => true, 'message' => 'Unidad eliminada correctamente']);
    }
}
