<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function listarEstados()
    {
        $estados = Estado::all();
        return response()->json($estados);
    }

    public function mostrarEstado($id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['error' => 'Estado no encontrado'], 404);
        }

        return response()->json($estado);
    }

    public function crearEstado(Request $request)
    {
        $estado = Estado::create($request->all());
        return response()->json($estado, 201);
    }

    public function actualizarEstado(Request $request, $id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['error' => 'Estado no encontrado'], 404);
        }

        $estado->update($request->all());

        return response()->json($estado, 200);
    }

    public function eliminarEstado($id)
    {
        $estado = Estado::find($id);

        if (!$estado) {
            return response()->json(['error' => 'Estado no encontrado'], 404);
        }

        $estado->delete();

        return response()->json(['message' => 'Estado eliminado correctamente'], 200);
    }
}
