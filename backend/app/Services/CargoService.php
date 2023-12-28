<?php

namespace App\Services;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CargoService
{
    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarCargos()
    {
        $cargos = Cargo::select('idCargo', 'nombre', 'descripcion')->get();
        return response()->json(['successful' => true, 'data' => $cargos]);
    }

    public function mostrarCargo($id)
    {
        $cargo = Cargo::select('idCargo', 'nombre', 'descripcion')->find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $cargo]);
    }

    public function crearCargo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:cargo',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre.',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $cargo = Cargo::create($request->all());

        return response()->json(['successful' => true, 'data' => $cargo], 201);
    }

    public function actualizarCargo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:cargo,nombre,' . $id . ',idCargo',
            'descripcion' => 'string',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre.',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        $cargo->update($request->all());

        return response()->json(['successful' => true, 'data' => $cargo]);
    }

    public function eliminarCargo($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        $cargo->delete();

        return response()->json(['successful' => true, 'message' => 'Cargo eliminado correctamente']);
    }
}
