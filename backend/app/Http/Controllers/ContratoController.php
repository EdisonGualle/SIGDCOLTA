<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    public function listarContratos()
    {
        $contratos = Contrato::all();
        return response()->json($contratos);
    }

    public function mostrarContrato($id)
    {
        $contrato = Contrato::with('usuario', 'cargo')->find($id);

        if (!$contrato) {
            return response()->json(['error' => 'Contrato no encontrado'], 404);
        }

        return response()->json($contrato);
    }

    public function crearContrato(Request $request)
    {
        $contrato = Contrato::create($request->all());
        return response()->json($contrato, 201);
    }

    public function actualizarContrato(Request $request, $id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['error' => 'Contrato no encontrado'], 404);
        }

        $contrato->update($request->all());

        return response()->json($contrato, 200);
    }

    public function eliminarContrato($id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['error' => 'Contrato no encontrado'], 404);
        }

        $contrato->delete();

        return response()->json(['message' => 'Contrato eliminado correctamente'], 200);
    }



    //funciones a consultas complejas
    public function contratosActivos()
    {
        $contratosActivos = DB::table('contrato')
            ->select('contrato.idContrato', 'empleado.nombre AS empleado', 'contrato.fechaInicio', 'contrato.fechaFin', 'tipocontrato.nombre AS tipoContrato')
            ->join('empleado', 'contrato.idEmpleado', '=', 'empleado.idEmpleado')
            ->join('tipocontrato', 'contrato.idTipoContrato', '=', 'tipocontrato.idTipoContrato')
            ->where('contrato.fechaFin', '>', now()) // now() obtiene la fecha actual
            ->get();

        return response()->json($contratosActivos);
    }

    //funciones que pueden venir del modelo
    public function contratosActivoss(){
        $contrato= new Contrato();
        $contratosActivos = $contrato->contratosActivos();
        return response()->json($contratosActivos);
    }

}
