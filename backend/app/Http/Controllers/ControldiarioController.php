<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlDiario;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;


class ControlDiarioController extends Controller
{
    /**
     * Lista todos los registros de control diario.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos de todos los registros de control diario (array).
     */
    public function listarControlDiarios()
    {
        $controlDiarios = ControlDiario::all();
        return response()->json(['successful' => true, 'data' => $controlDiarios], 200);
    }

    /**
     * Muestra los detalles de un registro de control diario específico.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del registro de control diario (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del registro de control diario solicitado (array) si existe.
     *         - 'error': Mensaje de error (cadena) si el registro no fue encontrado.
     */
    public function mostrarControlDiario($id)
    {
        $controlDiario = ControlDiario::find($id);

        if (!$controlDiario) {
            return response()->json(['successful' => false, 'error' => 'Control Diario no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $controlDiario], 200);
    }

    /**
     * Crea un nuevo registro de control diario con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'fechaControl': Fecha del control diario (formato de fecha, obligatorio).
     *         - 'horaEntrada': Hora de entrada (formato de hora, opcional).
     *         - 'horaSalida': Hora de salida (formato de hora, opcional).
     *         - 'horaEntradaReceso': Hora de entrada al receso (formato de hora, opcional).
     *         - 'horaSalidaReceso': Hora de salida del receso (formato de hora, opcional).
     *         - 'totalHoras': Total de horas (numérico, opcional).
     *         - 'idEmpleado': ID del empleado asociado al control diario (numérico, obligatorio, debe existir en la tabla 'empleados').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del registro de control diario creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearControlDiario(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaControl' => 'required|date',
            'horaEntrada' => 'nullable|date_format:H:i:s',
            'horaSalida' => 'nullable|date_format:H:i:s',
            'horaEntradaReceso' => 'nullable|date_format:H:i:s',
            'horaSalidaReceso' => 'nullable|date_format:H:i:s',
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe un control diario para el mismo usuario en la misma fecha
        $existingControl = ControlDiario::where('idEmpleado', $request->idEmpleado)
            ->where('fechaControl', $request->fechaControl)
            ->first();

        if ($existingControl) {
            return response()->json(['successful' => false, 'error' => 'Ya existe un control diario para este usuario en la misma fecha'], 422);
        }

        // Calcular el total de horas (ejemplo: sumar todas las horas proporcionadas)
        $totalHoras = $this->calcularTotalHoras($request);

        // Agregar el total de horas al arreglo de datos
        $requestData = $request->all();
        $requestData['totalHoras'] = $totalHoras;

        // Crear el registro de control diario
        $controlDiario = ControlDiario::create($requestData);

        return response()->json(['successful' => true, 'data' => $controlDiario], 201);
    }

    /**
     * Actualiza un registro de control diario existente con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'fechaControl': Fecha del control diario (formato de fecha, obligatorio).
     *         - 'horaEntrada': Hora de entrada (formato de hora, opcional).
     *         - 'horaSalida': Hora de salida (formato de hora, opcional).
     *         - 'horaEntradaReceso': Hora de entrada al receso (formato de hora, opcional).
     *         - 'horaSalidaReceso': Hora de salida del receso (formato de hora, opcional).
     *         - 'idEmpleado': ID del empleado asociado al control diario (numérico, obligatorio, debe existir en la tabla 'empleados').
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - ID del control diario a actualizar.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'data': Datos del control diario actualizado (array).
     *         - 'error': Mensaje de error si la actualización falla (string).
     */
    public function actualizarControlDiario(Request $request, $id)
    {
        // Obtener el registro de control diario existente
        $controlDiario = ControlDiario::find($id);

        // Verificar si el control diario existe
        if (!$controlDiario) {
            return response()->json(['successful' => false, 'error' => 'Control Diario no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'fechaControl' => 'date',
            'horaEntrada' => 'nullable|date_format:H:i:s',
            'horaSalida' => 'nullable|date_format:H:i:s',
            'horaEntradaReceso' => 'nullable|date_format:H:i:s',
            'horaSalidaReceso' => 'nullable|date_format:H:i:s',
            'idEmpleado' => 'exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Calcular el total de horas
        $totalHoras = $this->calcularTotalHoras($request);

        // Agregar el total de horas al arreglo de datos
        $requestData = $request->all();
        $requestData['totalHoras'] = $totalHoras;

        // Actualizar el registro de control diario
        $controlDiario->update($requestData);

        return response()->json(['successful' => true, 'data' => $controlDiario], 200);
    }


    /**
     * Elimina un registro de control diario específico.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del registro de control diario a eliminar (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'message': Mensaje de éxito (cadena) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el registro no fue encontrado.
     */
    public function eliminarControlDiario($id)
    {
        // Buscar el registro de control diario a eliminar
        $controlDiario = ControlDiario::find($id);

        // Si el registro no existe, retornar un mensaje de error
        if (!$controlDiario) {
            return response()->json(['successful' => false, 'error' => 'Control Diario no encontrado'], 404);
        }

        // Eliminar el registro de control diario
        $controlDiario->delete();

        return response()->json(['successful' => true, 'message' => 'Control Diario eliminado correctamente'], 200);
    }






    //otras funciones de busqueda

    /**
     * Obtiene todos los registros de control diario de un empleado específico.
     *
     * @param  int  $idEmpleado
     *         Parámetros de entrada:
     *         - 'idEmpleado': ID del empleado (numérico, obligatorio, debe existir en la tabla 'empleados').
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los registros de control diario del empleado (array).
     *         - 'errors': Detalles de los errores (array) si la operación falla.
     */
    public function controlesDiariosEmpleado($idEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);
        if (!$empleado) {
            return response()->json(['successful' => false, 'errors' => 'Empleado no encontrado'], 404);
        }

        // Obtener los registros de control diario del empleado
        $controlesDiarios = ControlDiario::where('idEmpleado', $idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $controlesDiarios], 200);
    }

    /**
     * Obtiene todos los registros de control diario de una fecha específica.
     *
     * @param  string  $fecha
     *         Parámetros de entrada:
     *         - 'fecha': Fecha específica para buscar registros (formato de fecha, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los registros de control diario de la fecha (array).
     *         - 'errors': Detalles de los errores (array) si la operación falla.
     */
    public function controlesDiariosFecha($fecha)
    {
        // Obtener los registros de control diario de la fecha
        $controlesDiarios = ControlDiario::where('fechaControl', $fecha)->get();

        // Verificar si hay registros para la fecha
        if ($controlesDiarios->isEmpty()) {
            return response()->json(['successful' => false, 'errors' => 'No hay registros para la fecha especificada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $controlesDiarios], 200);
    }

    /**
     * Obtiene todos los registros de control diario en un rango de fechas.
     *
     * @param  string  $fechaInicio
     *         Parámetros de entrada:
     *         - 'fechaInicio': Fecha de inicio del rango (formato de fecha, obligatorio).
     * @param  string  $fechaFin
     *         Parámetros de entrada:
     *         - 'fechaFin': Fecha de fin del rango (formato de fecha, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los registros de control diario en el rango de fechas (array).
     *         - 'errors': Detalles de los errores (array) si la operación falla.
     */
    public function controlesDiariosRangoFechas($fechaInicio, $fechaFin)
    {
        // Obtener los registros de control diario en el rango de fechas
        $controlesDiarios = ControlDiario::whereBetween('fechaControl', [$fechaInicio, $fechaFin])->get();

        // Verificar si hay registros para el rango de fechas
        if ($controlesDiarios->isEmpty()) {
            return response()->json(['successful' => false, 'errors' => 'No hay registros para el rango de fechas especificado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $controlesDiarios], 200);
    }



    /**
     * Obtiene el total de horas trabajadas por un empleado en un rango de fechas.
     *
     * @param  int     $idEmpleado
     *         ID del empleado (numérico, obligatorio).
     * @param  string  $fechaInicio
     *         Fecha de inicio del rango (formato de fecha, obligatorio).
     * @param  string  $fechaFin
     *         Fecha de fin del rango (formato de fecha, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del total de horas trabajadas (array) si la operación fue exitosa.
     */
    public function totalHorasTrabajadas($idEmpleado, $fechaInicio, $fechaFin)
    {
        // Validar los datos de entrada
        $validator = Validator::make(compact('idEmpleado', 'fechaInicio', 'fechaFin'), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Calcular el total de horas trabajadas
        $totalHoras = ControlDiario::where('idEmpleado', $idEmpleado)
            ->whereBetween('fechaControl', [$fechaInicio, $fechaFin])
            ->sum('totalHoras');

        return response()->json(['successful' => true, 'data' => ['totalHoras' => $totalHoras]], 200);
    }


    /**
     * Obtiene el último registro de control diario por empleado.
     *
     * @param  int  $idEmpleado
     *         ID del empleado (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del último registro de control diario (array) si la operación fue exitosa.
     */
    public function ultimoControlDiario($idEmpleado)
    {
        // Validar los datos de entrada
        $validator = Validator::make(compact('idEmpleado'), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Obtener el último registro de control diario
        $ultimoControlDiario = ControlDiario::where('idEmpleado', $idEmpleado)
            ->latest('fechaControl')
            ->first();

        return response()->json(['successful' => true, 'data' => $ultimoControlDiario], 200);
    }


    /**
     * Obtiene el promedio de horas trabajadas por un empleado en un rango de fechas.
     *
     * @param  int     $idEmpleado
     *         ID del empleado (numérico, obligatorio).
     * @param  string  $fechaInicio
     *         Fecha de inicio del rango (formato de fecha, obligatorio).
     * @param  string  $fechaFin
     *         Fecha de fin del rango (formato de fecha, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del promedio de horas trabajadas (array) si la operación fue exitosa.
     */
    public function promedioHorasTrabajadas($idEmpleado, $fechaInicio, $fechaFin)
    {
        // Validar los datos de entrada
        $validator = Validator::make(compact('idEmpleado', 'fechaInicio', 'fechaFin'), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Calcular el promedio de horas trabajadas
        $promedioHoras = ControlDiario::where('idEmpleado', $idEmpleado)
            ->whereBetween('fechaControl', [$fechaInicio, $fechaFin])
            ->avg('totalHoras');

        return response()->json(['successful' => true, 'data' => ['promedioHoras' => $promedioHoras]], 200);
    }



    //----------------------------------------------------------------
    //----------------------------------------------------------------
    //-------------FUNCIONES CALCULOS----------------------
    //----------------------------------------------------------------
    //----------------------------------------------------------------




    /**
     * Calcula el total de horas trabajadas en función de las horas proporcionadas.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'horaEntrada': Hora de entrada (formato de hora, opcional).
     *         - 'horaSalida': Hora de salida (formato de hora, opcional).
     *         - 'horaEntradaReceso': Hora de entrada al receso (formato de hora, opcional).
     *         - 'horaSalidaReceso': Hora de salida del receso (formato de hora, opcional).
     *
     * @return float
     *         Parámetros de salida:
     *         - Total de horas trabajadas (float redondeado a dos decimales).
     */
    private function calcularTotalHoras(Request $request)
    {
        // Convertir las horas proporcionadas a segundos
        $horaEntrada = strtotime($request->horaEntrada ?? '00:00:00');
        $horaSalida = strtotime($request->horaSalida ?? '00:00:00');
        $horaEntradaReceso = strtotime($request->horaEntradaReceso ?? '00:00:00');
        $horaSalidaReceso = strtotime($request->horaSalidaReceso ?? '00:00:00');

        // Asegurarse de que las horas nulas se establezcan a 0
        $horaEntrada = $horaEntrada ?: 0;
        $horaSalida = $horaSalida ?: 0;
        $horaEntradaReceso = $horaEntradaReceso ?: 0;
        $horaSalidaReceso = $horaSalidaReceso ?: 0;

        // Calcular el total trabajado restando las horas de receso
        $totalTrabajado = $horaSalida - $horaEntrada - ($horaSalidaReceso - $horaEntradaReceso);

        // Convertir el total a horas y redondear a dos decimales
        return round(max($totalTrabajado, 0) / 3600, 2); // No permitir que el total sea negativo
    }
}
