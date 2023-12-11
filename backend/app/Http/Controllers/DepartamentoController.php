<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function listarDepartamentos()
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    public function mostrarDepartamento($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['error' => 'Departamento no encontrado'], 404);
        }

        return response()->json($departamento);
    }

    public function crearDepartamento(Request $request)
    {
        $departamento = Departamento::create($request->all());
        return response()->json($departamento, 201);
    }

    public function actualizarDepartamento(Request $request, $id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['error' => 'Departamento no encontrado'], 404);
        }

        $departamento->update($request->all());

        return response()->json($departamento, 200);
    }

    public function eliminarDepartamento($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['error' => 'Departamento no encontrado'], 404);
        }

        $departamento->delete();

        return response()->json(['message' => 'Departamento eliminado correctamente'], 200);
    }
}
