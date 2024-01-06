<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatoBancario;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;

class DatoBancarioController extends Controller
{
    /**
     * Lista todos los datos bancarios registrados.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos de todos los registros de datos bancarios (array).
     */
    public function listarDatosBancarios()
    {
        $datosBancarios = DatoBancario::all();
        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    /**
     * Muestra los detalles de un dato bancario específico.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del dato bancario (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del dato bancario solicitado (array) si existe.
     *         - 'error': Mensaje de error (cadena) si el dato bancario no fue encontrado.
     */
    public function mostrarDatoBancario($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $datoBancario], 200);
    }

    /**
     * Crea un nuevo dato bancario con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombreBanco': Nombre del banco (cadena, obligatorio, máximo 255 caracteres).
     *         - 'numeroCuenta': Número de cuenta (cadena, obligatorio).
     *         - 'tipoCuenta': Tipo de cuenta (cadena, obligatorio, máximo 255 caracteres).
     *         - 'idEmpleado': ID del empleado asociado al dato bancario (numérico, obligatorio, debe existir en la tabla 'empleados').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del dato bancario creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearDatoBancario(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombreBanco' => 'required|string|max:255',
            'numeroCuenta' => 'required|string',
            'tipoCuenta' => 'required|string|max:255',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
        ], [
            'idEmpleado.exists' => 'No existe el empleado especificado'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe una cuenta bancaria con el mismo número para el empleado
        $existingDatoBancario = DatoBancario::where('numeroCuenta', $request->numeroCuenta)
            ->where('idEmpleado', $request->idEmpleado)
            ->first();

        if ($existingDatoBancario) {
            return response()->json(['successful' => false, 'error' => 'Ya existe una cuenta bancaria con el mismo número para este empleado'], 422);
        }

        // Crear el dato bancario
        $datoBancario = DatoBancario::create($request->all());

        return response()->json(['successful' => true, 'data' => $datoBancario], 201);
    }

    /**
     * Actualiza un dato bancario existente con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombreBanco': Nombre del banco (cadena, obligatorio, máximo 255 caracteres).
     *         - 'numeroCuenta': Número de cuenta (cadena, obligatorio).
     *         - 'tipoCuenta': Tipo de cuenta (cadena, obligatorio, máximo 255 caracteres).
     *         - 'idEmpleado': ID del empleado asociado al dato bancario (numérico, obligatorio, debe existir en la tabla 'empleados').
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - ID del dato bancario a actualizar.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del dato bancario actualizado (array).
     *         - 'error': Mensaje de error si la actualización falla (string).
     */
    public function actualizarDatoBancario(Request $request, $id)
    {
        // Obtener el dato bancario existente
        $datoBancario = DatoBancario::find($id);

        // Verificar si el dato bancario existe
        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombreBanco' => 'string|max:255',
            'numeroCuenta' => 'string',
            'tipoCuenta' => 'string|max:255',
            'idEmpleado' => 'numeric|exists:empleado,idEmpleado',
        ], [
            'idEmpleado.exists' => 'No existe el empleado edpecificado'
        ]);
        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe una cuenta bancaria con el mismo número para el mismo empleado
        $existingDatoBancario = DatoBancario::where('numeroCuenta', $request->numeroCuenta)
            ->where('idEmpleado', $request->idEmpleado)
            ->where('idDatoBancario', '!=', $id) // Excluir el dato bancario actual en la búsqueda
            ->first();

        if ($existingDatoBancario) {
            return response()->json(['successful' => false, 'error' => 'Ya existe una cuenta bancaria con el mismo número para este empleado'], 422);
        }


        // Actualizar el dato bancario
        $datoBancario->update($request->all());

        return response()->json(['successful' => true, 'data' => $datoBancario], 200);
    }

    /**
     * Elimina un dato bancario específico.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del dato bancario a eliminar (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'message': Mensaje de éxito (cadena) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el dato bancario no fue encontrado.
     */
    public function eliminarDatoBancario($id)
    {
        // Buscar el dato bancario a eliminar
        $datoBancario = DatoBancario::find($id);

        // Si el dato bancario no existe, retornar un mensaje de error
        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        // Eliminar el dato bancario
        $datoBancario->delete();

        return response()->json(['successful' => true, 'message' => 'Dato Bancario eliminado correctamente'], 200);
    }


    /**
     * Obtiene todos los números de cuenta asociados a un empleado específico.
     *
     * @param  int  $idEmpleado
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Números de cuenta asociados al empleado (array).
     *         - 'error': Mensaje de error si el empleado no existe (string).
     */
    public function numerosCuentaEmpleado($idEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener los números de cuenta asociados al empleado
        $datosBancarios = DatoBancario::where('idEmpleado', $idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }


    /**
     * Obtiene todos los datos bancarios asociados a un banco específico.
     *
     * @param  string  $nombreBanco
     *         Parámetros de entrada:
     *         - 'nombreBanco': Nombre del banco (cadena, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos bancarios asociados al banco (array).
     *         - 'error': Mensaje de error si no se encuentran datos bancarios para el banco especificado (string).
     */
    public function datosBancariosPorBanco($nombreBanco)
    {
        // Obtener los datos bancarios asociados al banco
        $datosBancarios = DatoBancario::where('nombreBanco', $nombreBanco)->get();

        // Verificar si se encontraron datos bancarios para el banco especificado
        if ($datosBancarios->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'No se encontraron datos bancarios para el banco especificado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    /**
     * Obtiene todos los datos bancarios asociados a un tipo de cuenta específico.
     *
     * @param  string  $tipoCuenta
     *         Parámetros de entrada:
     *         - 'tipoCuenta': Tipo de cuenta (cadena, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos bancarios asociados al tipo de cuenta (array).
     *         - 'error': Mensaje de error si no se encuentran datos bancarios para el tipo de cuenta especificado (string).
     */
    public function datosBancariosPorTipoCuenta($tipoCuenta)
    {
        // Obtener los datos bancarios asociados al tipo de cuenta
        $datosBancarios = DatoBancario::where('tipoCuenta', $tipoCuenta)->get();

        // Verificar si se encontraron datos bancarios para el tipo de cuenta especificado
        if ($datosBancarios->isEmpty()) {
            return response()->json(['error' => 'No se encontraron datos bancarios para el tipo de cuenta especificado'], 404);
        }

        return response()->json(['data' => $datosBancarios], 200);
    }
}
