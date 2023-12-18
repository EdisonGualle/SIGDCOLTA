<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferenciaLaboralController extends Controller
{
    /**
     * Lista todas las referencias laborales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarReferenciasLaborales()
    {
        $referenciasLaborales = ReferenciaLaboral::all();
        return response()->json(['successful' => true, 'data' => $referenciasLaborales]);
    }

    /**
     * Muestra los detalles de una referencia laboral específica.
     *
     * @param  int  $id - ID de la referencia laboral
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarReferenciaLaboral($id)
    {
        $referenciaLaboral = ReferenciaLaboral::find($id);

        if (!$referenciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Referencia Laboral no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $referenciaLaboral]);
    }

    /**
     * Crea una nueva referencia laboral con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

        // Crear la referencia laboral
        $referenciaLaboral = ReferenciaLaboral::create($request->all());

        return response()->json(['successful' => true, 'data' => $referenciaLaboral], 201);
    }

    /**
     * Actualiza los detalles de una referencia laboral existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la referencia laboral a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
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

        // Actualizar la referencia laboral
        $referenciaLaboral->update($request->all());

        return response()->json(['successful' => true, 'data' => $referenciaLaboral]);
    }

    /**
     * Elimina una referencia laboral existente.
     *
     * @param  int  $id - ID de la referencia laboral a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
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
