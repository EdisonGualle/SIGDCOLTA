<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return response()->json($cargos);
    }

    public function show($id)
    {
        $cargo = Cargo::find($id);
        
        if (!$cargo) {
            return response()->json(['error' => 'Cargo no encontrado'], 404);
        }

        return response()->json($cargo);
    }

    public function store(Request $request)
    {
        $cargo = Cargo::create($request->all());
        return response()->json($cargo, 201);
    }

    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['error' => 'Cargo no encontrado'], 404);
        }

        $cargo->update($request->all());

        return response()->json($cargo, 200);
    }

    public function destroy($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['error' => 'Cargo no encontrado'], 404);
        }

        $cargo->delete();

        return response()->json(['message' => 'Cargo eliminado correctamente'], 200);
    }
}
