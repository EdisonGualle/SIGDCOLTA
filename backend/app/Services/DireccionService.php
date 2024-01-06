<?php

namespace App\Services;

use App\Models\Direccion;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;
use Illuminate\Http\Request;

class DireccionService
{
    protected $validator;

    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    public function listarDirecciones()
    {
        $direcciones = Direccion::all();
        return response()->json(['successful' => true, 'data' => $direcciones]);
    }

    public function mostrarDireccionPorId($id)
    {
        $direccion = Direccion::find($id);

        if (!$direccion) {
            return response()->json(['successful' => false, 'error' => 'Direccion no encontrada']);
        }

        return response()->json(['successful' => true, 'data' => $direccion]);
    }

    public function crearDireccion(Request $request)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'required|string|max:255|unique:direccion',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe una dirección con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la dirección
        $direccion = Direccion::create($request->all());

        return response()->json(['successful' => true, 'data' => $direccion], 201);
    }

    public function actualizarDireccion(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'string|max:255|unique:direccion,nombre,' . $id,
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe una dirección con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $direccion = Direccion::find($id);

        if (!$direccion) {
            return response()->json(['successful' => false, 'error' => 'Direccion no encontrada'], 404);
        }

        // Actualizar la dirección
        $direccion->update($request->all());

        return response()->json(['successful' => true, 'data' => $direccion]);
    }

    public function eliminarDireccion($id)
    {
        $direccion = Direccion::find($id);

        if (!$direccion) {
            return response()->json(['successful' => false, 'error' => 'Direccion no encontrada'], 404);
        }

        $direccion->delete();

        return response()->json(['successful' => true, 'message' => 'Direccion eliminada correctamente']);
    }
}
