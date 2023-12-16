<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\Validator;



//otros modelos necesarios
use App\Models\Unidad; // Asegúrate de importar el modelo de la Unidad


class DepartamentoController extends Controller
{
    /**
     * Lista todos los departamentos.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los departamentos (array) si la operación fue exitosa.
     */
    public function listarDepartamentos()
    {
        $departamentos = Departamento::all();
        return response()->json(['successful' => true, 'data' => $departamentos]);
    }

    /**
     * Muestra los detalles de un departamento específico.
     *
     * @param  int  $id - ID del departamento
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del departamento solicitado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el departamento no fue encontrado.
     */
    public function mostrarDepartamento($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $departamento]);
    }

    /**
     * Crea un nuevo departamento con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombre': Nombre del departamento (cadena, obligatorio, máximo 255 caracteres, único en la tabla 'departamentos').
     *         - 'descripcion': Descripción del departamento (cadena, obligatorio).
     *         - 'telefonos': Teléfonos del departamento (cadena, opcional).
     *         - 'idUnidad': ID de la unidad a la que pertenece el departamento (numérico, obligatorio, debe existir en la tabla 'unidades').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del departamento creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearDepartamento(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:departamento',
            'descripcion' => 'required|string',
            'telefonos' => 'nullable|string',
            'idUnidad' => 'required|numeric|exists:unidad,idUnidad', // Asegura que idUnidad exista en la tabla 'unidad'
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


    /**
     * Actualiza los detalles de un departamento existente.
     * @param  int  $id - ID del departamento a actualizar
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID del departamento a actualizar (numérico, obligatorio).
     *         - 'nombre': Nuevo nombre del departamento (cadena, obligatorio, máximo 255 caracteres, único en la tabla 'departamentos').
     *         - 'descripcion': Nueva descripción del departamento (cadena, obligatorio).
     *         - 'telefonos': Nuevos teléfonos del departamento (cadena, opcional).
     *         - 'idUnidad': Nuevo ID de la unidad a la que pertenece el departamento (numérico, obligatorio, debe existir en la tabla 'unidades').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del departamento actualizado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si el departamento no fue encontrado.
     */
    public function actualizarDepartamento(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:departamento,nombre',
            'descripcion' => 'required|string',
            'telefonos' => 'nullable|string',
            'idUnidad' => 'required|numeric|exists:unidad,idUnidad', // Asegura que idUnidad exista en la tabla 'unidades'
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


    /**
     * Elimina un departamento existente.
     *
     * @param  int  $id - ID del departamento a eliminar
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si el departamento no fue encontrado.
     */
    public function eliminarDepartamento($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado'], 404);
        }

        $departamento->delete();

        return response()->json(['successful' => true, 'message' => 'Departamento eliminado correctamente']);
    }

    /**
     * Obtiene todos los departamentos asociados a una unidad específica.
     *
     * @param  int  $idUnidad
     *         Parámetros de entrada:
     *         - 'idUnidad': ID de la unidad (numérico, obligatorio, debe existir en la tabla 'unidades').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los departamentos de la unidad especificada (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si la unidad no fue encontrada.
     */
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
