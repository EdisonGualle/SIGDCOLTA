<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discapacidad;
use Illuminate\Support\Facades\Validator;


class DiscapacidadController extends Controller
{
    /**
     * Lista todas las discapacidades.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todas las discapacidades (array) si la operación fue exitosa.
     */
    public function listarDiscapacidades()
    {
        $discapacidades = Discapacidad::all();
        return response()->json(['successful' => true, 'data' => $discapacidades]);
    }

    /**
     * Muestra los detalles de una discapacidad específica.
     *
     * @param  int  $id 
     *         Parámetros de entrada:
     *         - 'id': ID de la discapacidad (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la discapacidad solicitada (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si la discapacidad no fue encontrada.
     */
    public function mostrarDiscapacidad($id)
    {
        $discapacidad = Discapacidad::find($id);

        if (!$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Discapacidad no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $discapacidad]);
    }

    /**
     * Crea una nueva discapacidad con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombre': Nombre de la discapacidad (cadena, obligatorio).
     *         - 'tipo': Tipo de discapacidad (cadena, obligatorio).
     *         - 'porcentaje': Porcentaje de discapacidad (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la discapacidad creada (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearDiscapacidad(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:discapacidad',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe un departamento con este nommbre'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la discapacidad
        $discapacidad = Discapacidad::create($request->all());

        return response()->json(['successful' => true, 'data' => $discapacidad], 201);
    }

    /**
     * Actualiza los detalles de una discapacidad existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID de la discapacidad a actualizar (numérico, obligatorio).
     *         - 'nombre': Nuevo nombre de la discapacidad (cadena, opcional).
     *         - 'tipo': Nuevo tipo de discapacidad (cadena, opcional).
     *         - 'descripcion': Nueva descripción de la discapacidad (cadena, opcional).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la discapacidad actualizada (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si la discapacidad no fue encontrada.
     */
    public function actualizarDiscapacidad(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
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
            $nombreValidator = Validator::make($request->all(), [
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

    /**
     * Elimina una discapacidad existente.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID de la discapacidad a eliminar (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si la discapacidad no fue encontrada.
     */
    public function eliminarDiscapacidad($id)
    {
        $discapacidad = Discapacidad::find($id);

        if (!$discapacidad) {
            return response()->json(['successful' => false, 'error' => 'Discapacidad no encontrada'], 404);
        }

        $discapacidad->delete();

        return response()->json(['successful' => true, 'message' => 'Discapacidad eliminada correctamente']);
    }

    /**
     * Obtiene todas las discapacidades de un tipo específico.
     *
     * @param  string  $tipo - Tipo de discapacidad a filtrar
     *         Parámetros de entrada:
     *         - 'tipo': Tipo de discapacidad (cadena, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de las discapacidades filtradas por tipo (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function obtenerDiscapacidadesPorTipo($tipo)
    {
        // Validar los datos de entrada
        $validator = Validator::make(['tipo' => $tipo], [
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
}
