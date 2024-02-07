<?php

namespace App\Services;

use App\Models\TipoContrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoContratoService
{
    public function listarTiposContrato()
    {
        $tipoContratos = TipoContrato::all();
        return response()->json(['successful' => true, 'data' => $tipoContratos]);
    }

    public function mostrarTipoContratoPorId($id)
    {
        $tipoContrato = TipoContrato::find($id);

        if (!$tipoContrato) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Contrato no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoContrato]);
    }

    public function crearTipoContrato(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:tipocontrato',
            'descripcion' => 'required|string',
            'clausulas' => 'string|nullable',
            'duracionMeses' => 'required|numeric|min:6|max:36',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el tipo de contrato
        $tipoContrato = TipoContrato::create($request->all());

        return response()->json(['successful' => true, 'data' => $tipoContrato], 201);
    }

    public function actualizarTipoContrato(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:tipoContrato,nombre,' . $id . ',idTipoContrato',
            'descripcion' => 'string',
            'clausulas' => 'string|nullable',
            'duracionMeses' => 'required|numeric|min:6|max:36',
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
