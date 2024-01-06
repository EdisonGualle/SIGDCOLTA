<?php

namespace App\Http\Controllers;

use App\Models\InstruccionFormal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstruccionFormalController extends Controller
{
    /**
     * Lista todas las instrucciones formales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarInstruccionesFormales()
    {
        $instruccionesFormales = InstruccionFormal::all();
        return response()->json(['successful' => true, 'data' => $instruccionesFormales]);
    }

    /**
     * Muestra los detalles de una instrucción formal específica.
     *
     * @param  int  $id - ID de la instrucción formal
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarInstruccionFormal($id)
    {
        $instruccionFormal = InstruccionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['successful' => false, 'error' => 'Instrucción Formal no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $instruccionFormal]);
    }

    /**
     * Crea una nueva instrucción formal con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearInstruccionFormal(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'fechaRegistro' => 'required|date',
            'nivelAcademico' => 'required|string|max:255',
            'archivo' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la instrucción formal
        $instruccionFormal = InstruccionFormal::create($request->all());

        return response()->json(['successful' => true, 'data' => $instruccionFormal], 201);
    }

    /**
     * Actualiza los detalles de una instrucción formal existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la instrucción formal a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarInstruccionFormal(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'titulo' => 'string|max:255',
            'fechaRegistro' => 'date',
            'nivelAcademico' => 'string|max:255',
            'archivo' => 'string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $instruccionFormal = InstruccionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['successful' => false, 'error' => 'Instrucción Formal no encontrada'], 404);
        }

        // Actualizar la instrucción formal
        $instruccionFormal->update($request->all());

        return response()->json(['successful' => true, 'data' => $instruccionFormal]);
    }

    /**
     * Elimina una instrucción formal existente.
     *
     * @param  int  $id - ID de la instrucción formal a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarInstruccionFormal($id)
    {
        $instruccionFormal = InstruccionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['successful' => false, 'error' => 'Instrucción Formal no encontrada'], 404);
        }

        $instruccionFormal->delete();

        return response()->json(['successful' => true, 'message' => 'Instrucción Formal eliminada correctamente']);
    }
}
