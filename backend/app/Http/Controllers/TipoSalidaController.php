<?php

namespace App\Http\Controllers;

use App\Models\TipoSalida;
use Illuminate\Http\Request;

class TipoSalidaController extends Controller
{
    public function listarTiposSalida()
    {
        $tiposSalida = TipoSalida::all();
        return response()->json($tiposSalida);
    }

    public function mostrarTipoSalida($id)
    {
        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['error' => 'Tipo de Salida no encontrado'], 404);
        }

        return response()->json($tipoSalida);
    }

    public function crearTipoSalida(Request $request)
    {
        $tipoSalida = TipoSalida::create($request->all());
        return response()->json($tipoSalida, 201);
    }

    public function actualizarTipoSalida(Request $request, $id)
    {
        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['error' => 'Tipo de Salida no encontrado'], 404);
        }

        $tipoSalida->update($request->all());

        return response()->json($tipoSalida, 200);
    }

    public function eliminarTipoSalida($id)
    {
        $tipoSalida = TipoSalida::find($id);

        if (!$tipoSalida) {
            return response()->json(['error' => 'Tipo de Salida no encontrado'], 404);
        }

        $tipoSalida->delete();

        return response()->json(['message' => 'Tipo de Salida eliminado correctamente'], 200);
    }
}
