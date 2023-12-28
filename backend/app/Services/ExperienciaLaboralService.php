<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\EvaluacionDesempeno;
use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExperienciaLaboralService
{
    /**
     * Lista todas las experiencias laborales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarExperienciasLaborales()
    {
        $experienciasLaborales = ExperienciaLaboral::all();
        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }

    /**
     * Muestra los detalles de una experiencia laboral específica.
     *
     * @param  int  $id - ID de la experiencia laboral
     * @return \Illuminate\Http\JsonResponse
     */
    public function mostrarExperienciasLaborales($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Experiencia Laboral no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $experienciaLaboral]);
    }

    /**
     * Crea una nueva experiencia laboral con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function crearExperienciaLaboral(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'institucion' => 'required|string|max:255',
            'telefonoInstitucion' => 'required|string|max:20',
            'areaTrabajo' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'fechaDesde' => 'required|date',
            'fechaHasta' => 'nullable|date|after_or_equal:fechaDesde',
            'actividades' => 'required|string',
            'archivo' => 'nullable|file|max:10240', // Tamaño máximo de archivo de 10 MB
            'idEmpleado' => 'required|numeric',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear la experiencia laboral
        $experienciaLaboral = ExperienciaLaboral::create($request->all());

        return response()->json(['successful' => true, 'data' => $experienciaLaboral], 201);
    }

    /**
     * Actualiza los detalles de una experiencia laboral existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id - ID de la experiencia laboral a actualizar
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarExperienciaLaboral(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'institucion' => 'string|max:255',
            'telefonoInstitucion' => 'string|max:20',
            'areaTrabajo' => 'string|max:255',
            'puesto' => 'string|max:255',
            'fechaDesde' => 'date',
            'fechaHasta' => 'nullable|date|after_or_equal:fechaDesde',
            'actividades' => 'string',
            'archivo' => 'nullable|file|max:10240', // Tamaño máximo de archivo de 10 MB
            'idEmpleado' => 'numeric',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Experiencia Laboral no encontrada'], 404);
        }

        // Actualizar la experiencia laboral
        $experienciaLaboral->update($request->all());

        return response()->json(['successful' => true, 'data' => $experienciaLaboral]);
    }

    /**
     * Elimina una experiencia laboral existente.
     *
     * @param  int  $id - ID de la experiencia laboral a eliminar
     * @return \Illuminate\Http\JsonResponse
     */
    public function eliminarExperienciaLaboral($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Experiencia Laboral no encontrada'], 404);
        }

        $experienciaLaboral->delete();

        return response()->json(['successful' => true, 'message' => 'Experiencia Laboral eliminada correctamente']);
    }





    /**
     * Obtener todas las experiencias laborales de un empleado específico.
     *
     * @param  int  $idEmpleado - ID del empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function experienciasLaboralesEmpleado($idEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener las experiencias laborales del empleado
        $experienciasLaborales = ExperienciaLaboral::where('idEmpleado', $idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }


    /**
     * Listar todas las instituciones únicas en las que ha trabajado un empleado.
     *
     * @param  int  $idEmpleado - ID del empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function institucionesUnicasEmpleado($idEmpleado)
    {

        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $institucionesUnicas = ExperienciaLaboral::where('idEmpleado', $idEmpleado)
            ->select('institucion')
            ->distinct()
            ->get();

        return response()->json(['successful' => true, 'data' => $institucionesUnicas]);
    }

    /**
     * Calcular la duración total de la experiencia laboral para un empleado.
     *
     * @param  int  $idEmpleado - ID del empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function duracionExperienciaLaboralEmpleado($idEmpleado)
    {
        $duracionTotal = ExperienciaLaboral::where('idEmpleado', $idEmpleado)
            ->select(DB::raw('SUM(DATEDIFF(fechaHasta, fechaDesde)) as duracionDias'))
            ->first();

        // Calcular en meses y años
        $duracionMeses = floor($duracionTotal->duracionDias / 30);
        $duracionAnios = floor($duracionMeses / 12);

        return response()->json([
            'successful' => true,
            'duracionDias' => $duracionTotal->duracionDias,
            'duracionMeses' => $duracionMeses,
            'duracionAnios' => $duracionAnios,
        ]);
    }

    /**
     * Encontrar todas las experiencias laborales que incluyan ciertas palabras clave en las actividades realizadas.
     *
     * @param  array  $palabrasClave - Palabras clave a buscar
     * @return \Illuminate\Http\JsonResponse
     */
    public function experienciasPorPalabrasClave($palabrasClave)
    {
        $experienciasLaborales = ExperienciaLaboral::where(function ($query) use ($palabrasClave) {
            foreach ($palabrasClave as $palabra) {
                $query->orWhere('actividades', 'like', "%$palabra%");
            }
        })->get();

        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }

    /**
     * Obtener las instituciones y el número de empleados que han trabajado en cada una.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function institucionesYNumEmpleados()
    {
        $institucionesNumEmpleados = ExperienciaLaboral::select('institucion', DB::raw('COUNT(DISTINCT idEmpleado) as numEmpleados'))
            ->groupBy('institucion')
            ->get();

        return response()->json(['successful' => true, 'data' => $institucionesNumEmpleados]);
    }

    /**
     * Encontrar experiencias laborales que hayan durado más de un cierto número de meses.
     *
     * @param  int  $numMeses - Número mínimo de meses de duración
     * @return \Illuminate\Http\JsonResponse
     */
    public function experienciasDuracionMayor($numMeses)
    {
        $experienciasLaborales = ExperienciaLaboral::whereRaw('DATEDIFF(fechaHasta, fechaDesde) > ?', [$numMeses * 30])
            ->get();

        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }
    /**
     * Encontrar y listar la cantidad total de empleados que tienen al menos una experiencia laboral.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function empleadosConExperiencia()
    {
        $empleadosConExperiencia = ExperienciaLaboral::select('idEmpleado')
            ->distinct()
            ->get();

        $empleadosDetalles = [];

        foreach ($empleadosConExperiencia as $empleado) {
            $idEmpleado = $empleado->idEmpleado;

            // Calcular la duración total de la experiencia laboral para el empleado
            $duracionTotal = ExperienciaLaboral::where('idEmpleado', $idEmpleado)
                ->select(DB::raw('SUM(DATEDIFF(fechaHasta, fechaDesde)) as duracionDias'))
                ->first();

            // Calcular en meses y años
            $duracionMeses = floor($duracionTotal->duracionDias / 30);
            $duracionAnios = floor($duracionMeses / 12);

            // Obtener las experiencias laborales del empleado
            $experienciasLaborales = ExperienciaLaboral::where('idEmpleado', $idEmpleado)->get();

            // Agregar detalles del empleado al arreglo
            $empleadosDetalles[] = [
                'idEmpleado' => $idEmpleado,
                'duracionDias' => $duracionTotal->duracionDias,
                'duracionMeses' => $duracionMeses,
                'duracionAnios' => $duracionAnios,
                'experienciasLaborales' => $experienciasLaborales,
            ];
        }

        // Agregar el total de empleados
        $totalEmpleados = count($empleadosConExperiencia);

        return response()->json(['successful' => true, 'data' => ['totalEmpleados' => $totalEmpleados, 'empleadosDetalles' => $empleadosDetalles]]);
    }
}
