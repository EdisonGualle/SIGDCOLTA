<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        return response()->json($empleado);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        $empleado->update($request->all());

        return response()->json($empleado, 200);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        $empleado->delete();

        return response()->json(['message' => 'Empleado eliminado correctamente'], 200);
    }

    public function usuarios($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        $usuarios = $empleado->usuarios;

        return response()->json($usuarios);
    }
}
