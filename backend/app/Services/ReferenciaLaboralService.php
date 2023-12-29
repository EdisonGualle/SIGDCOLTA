<?php

namespace App\Services;

use App\Models\ReferenciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferenciaLaboralService
{
    public function listarReferenciasLaborales()
    {
        $referenciasLaborales = ReferenciaLaboral::all();
        return response()->json(['successful' => true, 'data' => $referenciasLaborales]);
    }

    public function mostrarReferenciaLaboralPorId($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Referencia Laboral no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $referenciaLaboral]);
    }

    public function crearReferenciaLaboral(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'idExperienciaLaboral' => 'required|integer|exists:experienciaLaboral,idExperienciaLaboral',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Validar que no exista otra referencia laboral con la misma cédula en la misma experiencia
        $existingReference = ReferenciaLaboral::where('cedula', $request->cedula)
            ->where('idExperienciaLaboral', $request->idExperienciaLaboral)
            ->first();

        if ($existingReference) {
            return response()->json(['successful' => false, 'errors' => ['cedula' => ['Ya existe una referencia laboral con esta cédula en la misma experiencia.']]], 422);
        }

        // Crear la referencia laboral
        $referenciaLaboral = ReferenciaLaboral::create($request->all());

        return response()->json(['successful' => true, 'data' => $referenciaLaboral], 201);
    }

    public function actualizarReferenciaLaboral(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'cedula' => 'string|max:255',
            'telefono' => 'string|max:255',
            'email' => 'email|max:255',
            'idExperienciaLaboral' => 'integer|exists:experienciaLaboral,idExperienciaLaboral',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Referencia Laboral no encontrada'], 404);
        }

        // Validar que no exista otra referencia laboral con la misma cédula en la misma experiencia
        $existingReference = ReferenciaLaboral::where('cedula', $request->cedula)
            ->where('idExperienciaLaboral', $request->idExperienciaLaboral)
            ->where('idReferenciaLaboral', '!=', $id) // Excluir la referencia actual para permitir su propia actualización
            ->first();

        if ($existingReference) {
            return response()->json(['successful' => false, 'errors' => ['cedula' => ['Ya existe una referencia laboral con esta cédula en la misma experiencia.']]], 422);
        }

        // Actualizar la referencia laboral
        $referenciaLaboral->update($request->all());

        return response()->json(['successful' => true, 'data' => $referenciaLaboral]);
    }

    public function eliminarReferenciaLaboral($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Referencia Laboral no encontrada'], 404);
        }

        $referenciaLaboral->delete();

        return response()->json(['successful' => true, 'message' => 'Referencia Laboral eliminada correctamente']);
    }
}
