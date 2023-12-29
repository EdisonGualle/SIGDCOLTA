<?php

namespace App\Services;


use App\Models\InstruccionFormal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstruccionFormalService
{
  
    public function listarInstruccionesFormales()
    {
        $instruccionesFormales = InstruccionFormal::all();
        return response()->json(['successful' => true, 'data' => $instruccionesFormales]);
    }

    public function mostrarInstruccionFormalPorId($id)
    {
        $instruccionFormal = InstruccionFormal::find($id);

        if (!$instruccionFormal) {
            return response()->json(['successful' => false, 'error' => 'Instrucción Formal no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $instruccionFormal]);
    }

   
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
