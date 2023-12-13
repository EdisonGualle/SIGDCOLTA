<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


//Otros modelos necesarios
use App\Models\Empleado;
use App\Models\TipoContrato;

class ContratoController extends Controller
{
    /**
     * Lista todos los contratos.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los contratos (array) si la operación fue exitosa.
     */
    public function listarContratos()
    {
        $contratos = Contrato::all();
        return response()->json(['successful' => true, 'data' => $contratos]);
    }

    /**
     * Muestra los detalles de un contrato específico.
     *
     * @param  int  $id - ID del contrato
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del contrato solicitado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el contrato no fue encontrado.
     */
    public function mostrarContrato($id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $contrato]);
    }

    /**
     * Crea un nuevo contrato con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'fechaInicio': Fecha de inicio del contrato (formato de fecha, obligatorio).
     *         - 'fechaFin': Fecha de fin del contrato (formato de fecha, obligatorio).
     *         - 'idEmpleado': ID del empleado asociado al contrato (numérico, obligatorio, debe existir en la tabla 'empleados').
     *         - 'idTipoContrato': ID del tipo de contrato asociado (numérico, obligatorio, debe existir en la tabla 'tipo_contratos').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del contrato creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearContrato(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'required|numeric|exists:tipocontrato,idTipoContrato',
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el contrato
        $contrato = Contrato::create($request->all());

        return response()->json(['successful' => true, 'data' => $contrato], 201);
    }

    /**
     * Actualiza los detalles de un contrato existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID del contrato a actualizar (numérico, obligatorio).
     *         - 'fechaInicio': Nueva fecha de inicio del contrato (formato de fecha, obligatorio).
     *         - 'fechaFin': Nueva fecha de fin del contrato (formato de fecha, obligatorio).
     *         - 'idEmpleado': ID del empleado asociado al contrato (numérico, obligatorio, debe existir en la tabla 'empleados').
     *         - 'idTipoContrato': ID del tipo de contrato asociado (numérico, obligatorio, debe existir en la tabla 'tipo_contratos').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del contrato actualizado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si el contrato no fue encontrado.
     */
    public function actualizarContrato(Request $request, $id)
    {
        // Validar los datos de entrada
        // Validar los datos de entrada
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'required|numeric|exists:tipocontrato,idTipoContrato',
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado'], 404);
        }

        // Actualizar el contrato
        $contrato->update($request->all());

        return response()->json(['successful' => true, 'data' => $contrato]);
    }

    /**
     * Elimina un contrato existente.
     *
     * @param  int  $id - ID del contrato a eliminar
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si el contrato no fue encontrado.
     */
    public function eliminarContrato($id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado'], 404);
        }

        $contrato->delete();

        return response()->json(['successful' => true, 'message' => 'Contrato eliminado correctamente']);
    }
}




/*     //funciones a consultas complejas
    public function contratosActivos()
    {
        $contratosActivos = DB::table('contrato')
            ->select('contrato.idContrato', 'empleado.nombre AS empleado', 'contrato.fechaInicio', 'contrato.fechaFin', 'tipocontrato.nombre AS tipoContrato')
            ->join('empleado', 'contrato.idEmpleado', '=', 'empleado.idEmpleado')
            ->join('tipocontrato', 'contrato.idTipoContrato', '=', 'tipocontrato.idTipoContrato')
            ->where('contrato.fechaFin', '>', now()) // now() obtiene la fecha actual
            ->get();

        return response()->json($contratosActivos);
    }

    //funciones que pueden venir del modelo
    public function contratosActivoss(){
        $contrato= new Contrato();
        $contratosActivos = $contrato->contratosActivos();
        return response()->json($contratosActivos);
    } */