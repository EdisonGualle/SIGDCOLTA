<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\InstruccionFormal;
use App\Models\EmpleadoHasInstruccionFormal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoHasInstruccionFormalController extends Controller
{
    public function listarInstruccionesFormalesEmpleado()
    {
       /*  $instruccionesFormalesEmpleado = EmpleadoHasInstruccionFormal::with('empleado', 'instruccionFormal')->get();
        return response()->json(['successful' => true, 'data' => $instruccionesFormalesEmpleado]); */
        return response()->json('data');
    }

   /*  public function mostrarInstruccionFormalEmpleado($idEmpleado, $idInstruccionFormal)
    {
        $instruccionFormalEmpleado = EmpleadoHasInstruccionFormal::where('idEmpleado', $idEmpleado)
            ->where('idInstruccionFormal', $idInstruccionFormal)
            ->with('empleado', 'instruccionFormal')
            ->first();

        if (!$instruccionFormalEmpleado) {
            return response()->json(['successful' => false, 'error' => 'Instrucción formal del empleado no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $instruccionFormalEmpleado]);
    }

    public function crearInstruccionFormalEmpleado(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idInstruccionFormal' => 'required|exists:instruccion_formal,idInstruccionFormal',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $instruccionFormal = InstruccionFormal::find($request->idInstruccionFormal);

        if (!$empleado || !$instruccionFormal) {
            return response()->json(['successful' => false, 'error' => 'Empleado o instrucción formal no encontrados'], 404);
        }

        $instruccionFormalEmpleado = EmpleadoHasInstruccionFormal::create($request->all());

        return response()->json(['successful' => true, 'data' => $instruccionFormalEmpleado], 201);
    }

    public function actualizarInstruccionFormalEmpleado(Request $request, $idEmpleado, $idInstruccionFormal)
    {
        $validator = Validator::make($request->all(), [
            // Agrega las reglas de validación necesarias para la actualización.
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $instruccionFormalEmpleado = EmpleadoHasInstruccionFormal::where('idEmpleado', $idEmpleado)
            ->where('idInstruccionFormal', $idInstruccionFormal)
            ->first();

        if (!$instruccionFormalEmpleado) {
            return response()->json(['successful' => false, 'error' => 'Instrucción formal del empleado no encontrada'], 404);
        }

        $instruccionFormalEmpleado->update($request->all());

        return response()->json(['successful' => true, 'data' => $instruccionFormalEmpleado]);
    }

    public function eliminarInstruccionFormalEmpleado($idEmpleado, $idInstruccionFormal)
    {
        $instruccionFormalEmpleado = EmpleadoHasInstruccionFormal::where('idEmpleado', $idEmpleado)
            ->where('idInstruccionFormal', $idInstruccionFormal)
            ->first();

        if (!$instruccionFormalEmpleado) {
            return response()->json(['successful' => false, 'error' => 'Instrucción formal del empleado no encontrada'], 404);
        }

        $instruccionFormalEmpleado->delete();

        return response()->json(['successful' => true, 'message' => 'Instrucción formal del empleado eliminada correctamente']);
    } */
}
