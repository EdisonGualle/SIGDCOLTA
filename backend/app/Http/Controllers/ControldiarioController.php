<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlDiario;

class ControlDiarioController extends Controller
{
    public function listarControlDiarios()
    {
        $controlDiarios = ControlDiario::all();
        return response()->json(['data' => $controlDiarios], 200);
    }

    public function mostrarControlDiario($id)
    {
        $controlDiario = ControlDiario::find($id);

        if (!$controlDiario) {
            return response()->json(['error' => 'Control Diario no encontrado'], 404);
        }

        return response()->json(['data' => $controlDiario], 200);
    }

    public function crearControlDiario(Request $request)
    {
        $this->validate($request, [
            'fechaControl' => 'required|date',
            'horaEntrada' => 'nullable|date_format:H:i:s',
            'horaSalida' => 'nullable|date_format:H:i:s',
            'horaEntradaReceso' => 'nullable|date_format:H:i:s',
            'horaSalidaReceso' => 'nullable|date_format:H:i:s',
            'totalHoras' => 'nullable|numeric',
            'idEmpleado' => 'required|exists:empleados,idEmpleado',
        ]);

        $controlDiario = ControlDiario::create($request->all());

        return response()->json(['data' => $controlDiario], 201);
    }

    public function actualizarControlDiario(Request $request, $id)
    {
        $controlDiario = ControlDiario::find($id);

        if (!$controlDiario) {
            return response()->json(['error' => 'Control Diario no encontrado'], 404);
        }

        $this->validate($request, [
            'fechaControl' => 'required|date',
            'horaEntrada' => 'nullable|date_format:H:i:s',
            'horaSalida' => 'nullable|date_format:H:i:s',
            'horaEntradaReceso' => 'nullable|date_format:H:i:s',
            'horaSalidaReceso' => 'nullable|date_format:H:i:s',
            'totalHoras' => 'nullable|numeric',
            'idEmpleado' => 'required|exists:empleados,idEmpleado',
        ]);

        $controlDiario->update($request->all());

        return response()->json(['data' => $controlDiario], 200);
    }

    public function eliminarControlDiario($id)
    {
        $controlDiario = ControlDiario::find($id);

        if (!$controlDiario) {
            return response()->json(['error' => 'Control Diario no encontrado'], 404);
        }

        $controlDiario->delete();

        return response()->json(['message' => 'Control Diario eliminado correctamente'], 200);
    }
}
