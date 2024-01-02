<?php

namespace App\Services;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoService
{
    public function listarEstados()
    {
        $estados = Estado::all();
        return response()->json(['successful' => true, 'data' => $estados]);
    }

    public function mostrarEstado($id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $estado]);
    }

    public function crearEstado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipoEstado' => 'required|string|max:255|unique:estado',
        ], [
            'tipoEstado.unique' => 'Ya existe un estado con este tipo.',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $estado = Estado::create($request->all());

        return response()->json(['successful' => true, 'data' => $estado], 201);
    }

    public function actualizarEstado(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipoEstado' => 'string|max:255|unique:estado,tipoEstado,' . $id . ',idEstado',
        ], [
            'tipoEstado.unique' => 'Ya existe un estado con este tipo.',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        $estado->update($request->all());

        return response()->json(['successful' => true, 'data' => $estado]);
    }

    public function eliminarEstado($id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        $estado->delete();

        return response()->json(['successful' => true, 'message' => 'Estado eliminado correctamente']);
    }
}
