<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\ExperienciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienciaLaboralService
{

    public function listarExperienciasLaborales()
    {
        $experienciasLaborales = ExperienciaLaboral::all();
        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }


    public function mostrarExperienciaLaboralId($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Experiencia Laboral no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $experienciaLaboral]);
    }


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


    public function eliminarExperienciaLaboral($id)
    {
        $experienciaLaboral = ExperienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json(['successful' => false, 'error' => 'Experiencia Laboral no encontrada'], 404);
        }

        $experienciaLaboral->delete();

        return response()->json(['successful' => true, 'message' => 'Experiencia Laboral eliminada correctamente']);
    }


    public function listarExperienciasLaboralesPorEmpleadoId($idEmpleado)
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

    public function listarExperienciasLaboralesPorCedulaEmpleado($cedulaEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::where('cedula', $cedulaEmpleado)->first();


        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener las experiencias laborales del empleado
        $experienciasLaborales = ExperienciaLaboral::where('idEmpleado', $empleado->idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $experienciasLaborales]);
    }
}
