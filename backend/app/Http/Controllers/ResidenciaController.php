<?php

namespace App\Http\Controllers;

use App\Models\Residencia;
use App\Models\Empleado;  // Importar el modelo de Empleado
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidenciaController extends Controller
{
    /**
     * Lista todas las residencias.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarResidencias()
    {
        $residencias = Residencia::all();
        return response()->json(['successful' => true, 'data' => $residencias]);
    }

    /**
     * Muestra los detalles de una residencia específica.
     *
     * @param  int  $id - ID de la residencia
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarResidencia($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $residencia]);
    }

    /**
     * Crea una nueva residencia con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearResidencia(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'pais' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'canton' => 'required|string|max:255',
            'parroquia' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'calles' => 'required|string|max:255',
            'referencia' => 'required|string|max:255',
            'telefonoDomicilio' => 'required|string|max:255',
            'idEmpleado' => 'required|integer|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la residencia
        $residencia = Residencia::create($request->all());

        return response()->json(['successful' => true, 'data' => $residencia], 201);
    }

    /**
     * Actualiza los detalles de una residencia existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la residencia a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarResidencia(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'pais' => 'string|max:255',
            'provincia' => 'string|max:255',
            'canton' => 'string|max:255',
            'parroquia' => 'string|max:255',
            'sector' => 'string|max:255',
            'calles' => 'string|max:255',
            'referencia' => 'string|max:255',
            'telefonoDomicilio' => 'string|max:255',
            'idEmpleado' => 'integer|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        // Actualizar la residencia
        $residencia->update($request->all());

        return response()->json(['successful' => true, 'data' => $residencia]);
    }

    /**
     * Elimina una residencia existente.
     *
     * @param  int  $id - ID de la residencia a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarResidencia($id)
    {
        $residencia = Residencia::find($id);

        if (!$residencia) {
            return response()->json(['successful' => false, 'error' => 'Residencia no encontrada'], 404);
        }

        $residencia->delete();

        return response()->json(['successful' => true, 'message' => 'Residencia eliminada correctamente']);
    }
}
