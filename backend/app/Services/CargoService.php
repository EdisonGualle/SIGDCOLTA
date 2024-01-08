<?php

namespace App\Services;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $cargos = Cargo::all();
        return response()->json(['successful' => true, 'data' => $cargos]);
    }

    public function mostrarCargo($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $cargo]);
    }

    public function crearCargo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:cargo,nombre,NULL,idCargo,idUnidad,' . $request->get('idUnidad'),
            'descripcion' => 'required|string',
            'idUnidad' => 'required|numeric|exists:unidad,idUnidad',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre en la misma unidad.',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $cargo = Cargo::create($request->all());

        return response()->json(['successful' => true, 'data' => $cargo], 201);
    }

    public function actualizarCargo(Request $request, $idCargo)
    {
        $cargo = Cargo::find($idCargo);
    
        if (!$cargo) {
            return response()->json(['successful' => false, 'message' => 'Cargo no encontrado'], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255|unique:cargo,nombre,' . $idCargo . ',idCargo,idUnidad,' . $request->input('idUnidad'),
            'descripcion' => 'sometimes|required|string',
            'idUnidad' => 'nullable|numeric|exists:unidad,idUnidad',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre en la misma unidad.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }
    
        $cargo->update($request->only(['nombre', 'descripcion', 'idUnidad']));
    
        return response()->json(['successful' => true, 'message' => 'Cargo actualizado con éxito', 'data' => $cargo]);
    }
    
    






    public function eliminarCargo($id)
    {
        if (!is_numeric($id)) {
            return response()->json(['successful' => false, 'error' => 'ID de cargo no válido'], 422);
        }

        $id = (int) $id; // Convertir a entero

        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado'], 404);
        }

        $cargo->delete();

        return response()->json(['successful' => true, 'message' => 'Cargo eliminado correctamente']);
    }

}
