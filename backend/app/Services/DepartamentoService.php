<?php

namespace App\Services;

use App\Models\Departamento;
use App\Models\Unidad;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;
use Illuminate\Http\Request;

class DepartamentoService
{
    protected $validator;

    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    public function listarDepartamentos()
    {
        $departamentos = Departamento::all();
        return response()->json(['successful' => true, 'data' => $departamentos]);
    }

    public function mostrarDepartamentoPorId($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $departamento]);
    }

   
    public function listarDepartamentosPorIdUnidad($idUnidad)
    {
        $departamentos = Departamento::where('idUnidad', $idUnidad)->get();

        return response()->json(['successful' => true, 'data' => $departamentos]);
    }

    public function listarDepartamentosPorNombreUnidad($nombreUnidad)
    {
        $unidad = Unidad::where('nombre', $nombreUnidad)->first();

        if (!$unidad) {
            return response()->json(['successful' => false, 'error' => 'No se encontró la unidad especificada.'], 404);
        }

        $departamentos = Departamento::where('idUnidad', $unidad->idUnidad)->get();

        return response()->json(['successful' => true, 'data' => $departamentos]);
    }

    public function crearDepartamento(Request $request)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'required|string|max:255|unique:departamento',
            'descripcion' => 'required|string',
            'telefonos' => 'nullable|string',
            'idUnidad' => 'required|numeric|exists:unidad,idUnidad',
        ], [
            'nombre.unique' => 'Ya existe un departamento con este nombre.',
            'idUnidad.exists' => 'La unidad especificada no existe.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el departamento
        $departamento = Departamento::create($request->all());

        return response()->json(['successful' => true, 'data' => $departamento], 201);
    }

    public function actualizarDepartamento(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'string|max:255|unique:departamento,nombre,' . $id,
            'descripcion' => 'required|string',
            'telefonos' => 'nullable|string',
            'idUnidad' => 'required|numeric|exists:unidad,idUnidad',
        ], [
            'nombre.unique' => 'Ya existe un departamento con este nombre.',
            'idUnidad.exists' => 'La unidad especificada no existe.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado'], 404);
        }

        // Actualizar el departamento
        $departamento->update($request->all());

        return response()->json(['successful' => true, 'data' => $departamento]);
    }

    public function eliminarDepartamento($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado'], 404);
        }

        $departamento->delete();

        return response()->json(['successful' => true, 'message' => 'Departamento eliminado correctamente']);
    }

    public function departamentosPorUnidad($idUnidad)
    {
        // Verificar si la unidad existe
        $unidadExistente = Unidad::where('idUnidad', $idUnidad)->exists();

        if (!$unidadExistente) {
            return response()->json(['successful' => false, 'error' => 'La unidad especificada no existe.'], 404);
        }

        // Obtener todos los departamentos de la unidad especificada
        $departamentos = Departamento::where('idUnidad', $idUnidad)->get();

        return response()->json(['successful' => true, 'data' => $departamentos]);
    }
}
