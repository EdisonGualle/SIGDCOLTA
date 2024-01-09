<?php

namespace App\Http\Controllers;

use App\Models\Calendario_actividades_gad;
use App\Models\Empleado;
use App\Models\RegistroAsistencia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Calendario_actividades_gad_Controller extends Controller
{


    public function obtenerDiasLaborablesEmpleado(request $request)
    {

        // Validar la solicitud usando el Validator
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado', // Asegúrate de ajustar el nombre de la tabla 'empleados'
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ], [
            'idEmpleado.exists' => 'No existe el empleado especificado',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio',
        ]);
        // Si la validación falla, devuelve los errores
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        // Verificar si el empleado existe
        $empleado = Empleado::find($request->idEmpleado);

        // Utilizar relaciones Eloquent
        $contratos = $empleado->contratos()
            ->whereBetween('fechaInicio', [$request->fechaInicio, $request->fechaFin])
            ->where('estadoContrato', 'Activo')
            ->get();

        // Calcular la cantidad total de días laborables
        $diasTotales = 0;

        foreach ($contratos as $contrato) {
            // Calcular la cantidad de días laborables en el rango de fechas del contrato
            $diasTotales += $this->calcularDiasLaborables($contrato->fechaInicio, $contrato->fechaFin);
        }

        return response()->json(['successful' => true, 'cantidad_dias_contrato' => $diasTotales, 'idEmpleado' => (int) $request->idEmpleado]);
    }

    private function calcularDiasLaborables($fechaInicio, $fechaFin)
    {
        $inicio = Carbon::parse($fechaInicio);
        $fin = Carbon::parse($fechaFin);

        $diasLaborables = $inicio->diffInDaysFiltered(function (Carbon $date) {
            // Puedes ajustar esta lógica según tus requisitos específicos
            // Por ejemplo, puedes verificar si el día actual es un día laborable o si es un día festivo, etc.
            return $date->isWeekday() && !$this->esDiaFeriado($date);
        }, $fin);

        return $diasLaborables;
    }

    private function esDiaFeriado($fecha)
    {
        // Aquí debes buscar en la tabla calendario_actividades_ga
        // y verificar si la fecha dada es un día feriado o jornada única
        $result = DB::table('calendario_actividades_gad')
            ->where('fecha', $fecha->format('Y-m-d'))
            ->whereIn('tipoDia', ['feriado', 'jornadaUnica'])
            ->exists();

        return $result;
    }


    public function obtenerDiasLaboradosPorEmpleado(Request $request)
    {
        // Validar la solicitud usando el Validator
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado', // Asegúrate de ajustar el nombre de la tabla 'empleados'
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ], [
            'idEmpleado.exists' => 'No existe el empleado especificado',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio',
        ]);
        // Si la validación falla, devuelve los errores
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Obtener el empleado por su ID
        $empleado = Empleado::find($request->idEmpleado);

        if (!$empleado) {
            return response()->json(['error' => 'No existe el empleado especificado'], 404);
        }

        // Consultar la base de datos utilizando Eloquent
        $resultados = RegistroAsistencia::where('idEmpleado', $request->idEmpleado)
            ->whereBetween('fecha', [$request->fechaInicio, $request->fechaFin])
            ->whereIn('estadoAsistencia', ['presente', 'justificado', 'atrasado'])
            ->where('tipoAsistencia', 'entrada')
            ->get();

        // Obtener las fechas y contar los días laborados
        $fechasLaborados = $resultados->pluck('fecha')->toArray();
        $diasLaborados = count($fechasLaborados);

        return response()->json([
            'diasLaborados' => $diasLaborados,
            'fechasLaborados' => $fechasLaborados,
        ]);
    }




    public function registrarActividadesMesesAuto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
            'tipoDia' => 'string',
        ]);

        // Establecer el valor predeterminado si 'tipoDia' no está presente en la solicitud
        $request->merge(['tipoDia' => $request->get('tipoDia', 'normal')]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $inicio = Carbon::parse($request->fechaInicio);
        $fin = Carbon::parse($request->fechaFin);

        $currentDate = $inicio->copy();
        while ($currentDate <= $fin) {
            $this->registrarActividadParaFecha($currentDate, $request->tipoDia); // Corregir aquí
            $currentDate->addDay(); // Avanzar al siguiente día
        }

        // Puedes agregar aquí cualquier lógica adicional después del bucle, si es necesario
    }

   
    private function registrarActividadParaFecha($fecha, $tipoDia)
    {
        Calendario_actividades_gad::updateOrCreate(
            ['fecha' => $fecha->format('Y-m-d')],
            [
                'tipoDia' => $tipoDia,
                'descripcion_actividad' => 'Actividad normal programada'
            ]
        );
    }

    public function actualizarActividad(Request $request, $fecha)
    {
        $validator = Validator::make($request->all(), [
            'tipoDia' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $fecha = Carbon::parse($fecha);
        $actividad = Calendario_actividades_gad::where('fecha', $fecha->format('Y-m-d'))->first();

        if (!$actividad) {
            return response()->json(['error' => 'No se encontró actividad para la fecha proporcionada'], 404);
        }

        $actividad->update([
            'tipoDia' => $request->input('tipoDia', $actividad->tipoDia),
            'descripcion_actividad' => $request->input('descripcion_actividad', $actividad->descripcion_actividad),
        ]);

        return response()->json(['message' => 'Actividad actualizada correctamente']);
    }

    public function eliminarActividad($fecha)
    {
        $fecha = Carbon::parse($fecha);
        $actividad = Calendario_actividades_gad::where('fecha', $fecha->format('Y-m-d'))->first();

        if (!$actividad) {
            return response()->json(['error' => 'No se encontró actividad para la fecha proporcionada'], 404);
        }

        $actividad->delete();

        return response()->json(['message' => 'Actividad eliminada correctamente']);
    }
}
