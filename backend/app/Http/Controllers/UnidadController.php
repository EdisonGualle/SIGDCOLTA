<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnidadController extends Controller
{
    /**
     * Lista todas las unidades.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarUnidades()
    {
        $unidades = Unidad::all();
        return response()->json(['successful' => true, 'data' => $unidades]);
    }

    /**
     * Muestra los detalles de una unidad específica.
     *
     * @param  int  $id - ID de la unidad
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarUnidad($id)
    {
        $unidad = Unidad::find($id);

        if (!$unidad) {
            return response()->json(['successful' => false, 'error' => 'Unidad no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $unidad]);
    }

    /**
     * Crea una nueva unidad con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Actualiza los detalles de una unidad existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la unidad a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Elimina una unidad existente.
     *
     * @param  int  $id - ID de la unidad a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
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
