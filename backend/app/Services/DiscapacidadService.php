<?php

namespace App\Services;

use App\Models\Discapacidad;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;
use Illuminate\Http\Request;

class DiscapacidadService
{
    protected $validator;

    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    public function listarDiscapacidades()
    {
        $discapacidades = Discapacidad::all();
        return response()->json(['successful' => true, 'data' => $discapacidades]);
    }

    public function mostrarDiscapacidadPorId($id)
    {
        $discapacidad = Discapacidad::find($id);

        if (!$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Discapacidad no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $discapacidad]);
    }

    public function listarDiscapacidadesPorTipo($tipo)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make(['tipo' => $tipo], [
            'tipo' => 'required|string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Obtener las discapacidades por tipo
        $discapacidades = Discapacidad::where('tipo', $tipo)->get();

        return response()->json(['successful' => true, 'data' => $discapacidades]);
    }

    public function crearDiscapacidad(Request $request)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'required|string|unique:discapacidad',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe una discapacidad con este nombre'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la discapacidad
        $discapacidad = Discapacidad::create($request->all());

        return response()->json(['successful' => true, 'data' => $discapacidad], 201);
    }

    public function actualizarDiscapacidad(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'string',
            'tipo' => 'string',
            'descripcion' => 'string',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $discapacidad = Discapacidad::find($id);

        if (!$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Discapacidad no encontrada'], 404);
        }

        // Verificar si el nuevo nombre ya está en uso por otra discapacidad
        if ($request->has('nombre') && $request->input('nombre') !== $discapacidad->nombre) {
            $nombreValidator = $this->validator->make($request->all(), [
                'nombre' => 'unique:discapacidad,nombre',
            ], [
                'nombre.unique' => 'Ya existe una discapacidad con este nombre'
            ]);

            if ($nombreValidator->fails()) {
                return response()->json(['successful' => false, 'errors' => $nombreValidator->errors()], 422);
            }
        }

        // Actualizar la discapacidad
        $discapacidad->update($request->all());

        return response()->json(['successful' => true, 'data' => $discapacidad]);
    }

    public function eliminarDiscapacidad($id)
    {
        $discapacidad = Discapacidad::find($id);

        if (!$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->delete();

        return response()->json(['successful' => true, 'message' => 'Discapacidad eliminada correctamente']);
    }
}
