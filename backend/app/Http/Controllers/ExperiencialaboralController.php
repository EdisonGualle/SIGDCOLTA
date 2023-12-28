<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Services\ExperienciaLaboralService; // Asegúrate de importar el servicio correspondiente
use Illuminate\Support\Facades\Validator;

class ExperienciaLaboralController extends Controller
{
    protected $experienciaLaboralService;

    public function __construct(ExperienciaLaboralService $experienciaLaboralService)
    {
        $this->experienciaLaboralService = $experienciaLaboralService;
    }

    public function listarExperienciasLaborales()
    {
        return $this->experienciaLaboralService->listarExperienciasLaborales();
    }

    public function mostrarExperienciasLaborales($id)
    {
        return $this->experienciaLaboralService->mostrarExperienciasLaborales($id);
    }

    public function crearExperienciaLaboral(Request $request)
    {
        return $this->experienciaLaboralService->crearExperienciaLaboral($request);
    }

    public function actualizarExperienciaLaboral(Request $request, $id)
    {
        return $this->experienciaLaboralService->actualizarExperienciaLaboral($request, $id);
    }

    public function eliminarExperienciaLaboral($id)
    {
        return $this->experienciaLaboralService->eliminarExperienciaLaboral($id);
    }

    public function experienciasLaboralesEmpleado($idEmpleado)
    {
        return $this->experienciaLaboralService->experienciasLaboralesEmpleado($idEmpleado);
    }

    public function institucionesUnicasEmpleado($idEmpleado)
    {
        return $this->experienciaLaboralService->institucionesUnicasEmpleado($idEmpleado);
    }

    public function duracionExperienciaLaboralEmpleado($idEmpleado)
    {
        return $this->experienciaLaboralService->duracionExperienciaLaboralEmpleado($idEmpleado);
    }

    public function experienciasPorPalabrasClave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'palabrasClave' => 'required|array',
            'palabrasClave.*' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        return $this->experienciaLaboralService->experienciasPorPalabrasClave($request->input('palabrasClave'));
    }

    public function institucionesYNumEmpleados()
    {
        return $this->experienciaLaboralService->institucionesYNumEmpleados();
    }

    public function experienciasDuracionMayor($numMeses)
    {
        return $this->experienciaLaboralService->experienciasDuracionMayor($numMeses);
    }

    public function empleadosConExperiencia()
    {
        return $this->experienciaLaboralService->empleadosConExperiencia();
    }
}
