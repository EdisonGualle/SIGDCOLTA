<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoController extends Controller
{
    /**
     * Lista todos los estados.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarEstados()
    {
        $estados = Estado::all();
        return response()->json(['successful' => true, 'data' => $estados]);
    }

    /**
     * Muestra los detalles de un estado específico.
     *
     * @param  int  $id - ID del estado
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarEstado($id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $estado]);
    }

    /**
     * Crea un nuevo estado con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearEstado(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'tipoEstado' => 'required|string|max:255|unique:estado',
        ], [
            'tipoEstado.unique' => 'Ya existe un estado con este tipo.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el estado
        $estado = Estado::create($request->all());

        return response()->json(['successful' => true, 'data' => $estado], 201);
    }

    /**
     * Actualiza los detalles de un estado existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID del estado a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarEstado(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'tipoEstado' => 'string|max:255|unique:estado,tipoEstado,' . $id . ',idEstado',
        ], [
            'tipoEstado.unique' => 'Ya existe un estado con este tipo.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        // Actualizar el estado
        $estado->update($request->all());

        return response()->json(['successful' => true, 'data' => $estado]);
    }

    /**
     * Elimina un estado existente.
     *
     * @param  int  $id - ID del estado a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
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
