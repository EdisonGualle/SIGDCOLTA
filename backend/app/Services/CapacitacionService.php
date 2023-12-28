<?php

namespace App\Services;

use App\Models\Capacitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CapacitacionService
{

    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarCapacitaciones()
    {
        $capacitaciones = Capacitacion::select('idCapacitacion', 'nombre', 'descripcion', 'tipoEvento', 'institucion', 'cantidadHoras', 'fecha')->get();
        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }

    public function listarCapacitacionPorId($id)
    {
        $capacitacion = Capacitacion::select('idCapacitacion', 'nombre', 'descripcion', 'tipoEvento', 'institucion', 'cantidadHoras', 'fecha')->find($id);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $capacitacion]);
    }

    public function listarCapacitacionPorNombre($nombre)
    {
        $capacitaciones = Capacitacion::select('idCapacitacion', 'nombre', 'descripcion', 'tipoEvento', 'institucion', 'cantidadHoras', 'fecha')
            ->where('nombre', 'LIKE', '%' . $nombre . '%')
            ->get();

        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }

    public function listarCapacitacionesPorFecha($fecha)
    {
        $validator = Validator::make(['fecha' => $fecha], [
            'fecha' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $capacitaciones = Capacitacion::select('idCapacitacion', 'nombre', 'descripcion', 'tipoEvento', 'institucion', 'cantidadHoras', 'fecha')
            ->whereDate('fecha', '=', $fecha)
            ->get();

        if ($capacitaciones->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'No hay capacitaciones para la fecha especificada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }

    public function listarCapacitacionesPorRangoDeFechas($fechaInicio, $fechaFin)
    {
        // Validar las fechas de entrada
        $validator = $this->validator->make([
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
        ], [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
        ]);


        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return ['successful' => false, 'errors' => $validator->errors()];
        }

        $capacitaciones = Capacitacion::select('idCapacitacion', 'nombre', 'descripcion', 'tipoEvento', 'institucion', 'cantidadHoras', 'fecha')
            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->get();

        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }


    public function crearCapacitacion(Request $request)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipoEvento' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'cantidadHoras' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return ['successful' => false, 'errors' => $validator->errors()];
        }

        // Crear la capacitación
        $capacitacion = Capacitacion::create($request->all());

        return ['successful' => true, 'data' => $capacitacion];
    }

    public function actualizarCapacitacion(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'tipoEvento' => 'string|max:255',
            'institucion' => 'string|max:255',
            'cantidadHoras' => 'numeric',
            'fecha' => 'date',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Buscar la capacitación por ID
        $capacitacion = Capacitacion::find($id);

        // Si la capacitación no se encuentra, retornar un error
        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        // Actualizar la capacitación con los nuevos datos
        $capacitacion->update($request->all());

        return response()->json(['successful' => true, 'data' => $capacitacion]);
    }

    public function eliminarCapacitacion($id)
    {
        // Lógica para eliminar la capacitación...
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return ['successful' => false, 'error' => 'Capacitación no encontrada'];
        }

        $capacitacion->delete();

        return ['successful' => true, 'data' => ['message' => 'Capacitación eliminada correctamente']];
    }
}
