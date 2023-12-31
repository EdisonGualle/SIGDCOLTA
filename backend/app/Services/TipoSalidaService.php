<?php

namespace App\Services;

use App\Models\TipoSalida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoSalidaService
{
    public function listarTiposSalida()
    {
        $tiposSalida = TipoSalida::all();
        return response()->json(['successful' => true, 'data' => $tiposSalida]);
    }

    public function mostrarTipoSalidaPorId($id)
    {
        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Salida no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoSalida]);
    }

    public function crearTipoSalida(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:tipoSalida',
            'descripcion' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el tipo de salida
        $tipoSalida = TipoSalida::create($request->all());

        return response()->json(['successful' => true, 'data' => $tipoSalida], 201);
    }

    public function actualizarTipoSalida(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:tipoSalida,nombre,' . $id . ',idTipoSalida',
            'descripcion' => 'string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Salida no encontrado'], 404);
        }

        // Actualizar el tipo de salida
        $tipoSalida->update($request->all());

        return response()->json(['successful' => true, 'data' => $tipoSalida]);
    }

    public function eliminarTipoSalida($id)
    {
        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Salida no encontrado'], 404);
        }

        $tipoSalida->delete();

        return response()->json(['successful' => true, 'message' => 'Tipo de Salida eliminado correctamente']);
    }
}
