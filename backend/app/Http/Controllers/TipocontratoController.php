<?php

namespace App\Http\Controllers;

use App\Models\TipoContrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoContratoController extends Controller
{
    /**
     * Lista todos los tipos de contrato.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarTiposContrato()
    {
        $tipoContratos = TipoContrato::all();
        return response()->json(['successful' => true, 'data' => $tipoContratos]);
    }

    /**
     * Muestra los detalles de un tipo de contrato específico.
     *
     * @param  int  $id - ID del tipo de contrato
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarTipoContrato($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Contrato no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoContrato]);
    }

    /**
     * Crea un nuevo tipo de contrato con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearTipoContrato(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:tipocontrato',
            'descripcion' => 'required|string',
            'clausulas' => 'string|nullable',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el tipo de contrato
        $tipoContrato = TipoContrato::create($request->all());

        return response()->json(['successful' => true, 'data' => $tipoContrato], 201);
    }

    /**
     * Actualiza los detalles de un tipo de contrato existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID del tipo de contrato a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarTipoContrato(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:tipoContrato,nombre,' . $id . ',idTipoContrato',
            'descripcion' => 'string',
            'clausulas' => 'string|nullable',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Contrato no encontrado'], 404);
        }

        // Actualizar el tipo de contrato
        $tipoContrato->update($request->all());

        return response()->json(['successful' => true, 'data' => $tipoContrato]);
    }

    /**
     * Elimina un tipo de contrato existente.
     *
     * @param  int  $id - ID del tipo de contrato a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarTipoContrato($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Contrato no encontrado'], 404);
        }

        $tipoContrato->delete();

        return response()->json(['successful' => true, 'message' => 'Tipo de Contrato eliminado correctamente']);
    }
}
