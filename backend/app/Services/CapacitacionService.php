<?php

namespace App\Services;

use App\Models\Capacitacion;
use App\Models\Empleado;
use App\Models\EmpleadoHasCapacitacion;
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
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $capacitacion]);
    }
    public function listarCapacitacionPorNombre($nombre)
    {
        $capacitaciones = Capacitacion::where('nombre', 'LIKE', '%' . $nombre . '%')
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

        $capacitaciones = Capacitacion::whereDate('fecha', '=', $fecha)
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

        // Verificar si ya existe una capacitación con los mismos atributos
        $existingCapacitacion = Capacitacion::where([
            'nombre' => $request->nombre,
            'tipoEvento' => $request->tipoEvento,
            'institucion' => $request->institucion,
            'cantidadHoras' => $request->cantidadHoras,
            'fecha' => $request->fecha,
        ])->first();

        // Si ya existe, retornar un error
        if ($existingCapacitacion) {
            return ['successful' => false, 'errors' => 'Ya existe una capacitación con estos datos.'];
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

        // Verificar si ya existe otra capacitación con los mismos atributos
        $existingCapacitacion = Capacitacion::where([
            'nombre' => $request->nombre,
            'tipoEvento' => $request->tipoEvento,
            'institucion' => $request->institucion,
            'cantidadHoras' => $request->cantidadHoras,
            'fecha' => $request->fecha,
        ])->where('idCapacitacion', '!=', $id)->first();

        // Si ya existe, retornar un error
        if ($existingCapacitacion) {
            return response()->json(['successful' => false, 'errors' => 'Ya existe otra capacitación con estos atributos.'], 422);
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


    //OPERACIONES PARA TABLA EMPLEADO_HAS_CAPACITACIONES

    public function crearAsignacionEmpleadoCapacitacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idCapacitacion' => 'required|exists:capacitacion,idCapacitacion',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $empleado = Empleado::find($request->idEmpleado);
        $capacitacion = Capacitacion::find($request->idCapacitacion);

        if (!$empleado || !$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Empleado o capacitación no encontrados'], 404);
        }

        // Check if the relationship already exists
        if (!$empleado->capacitaciones->contains($capacitacion->idCapacitacion)) {
            $empleado->capacitaciones()->attach($capacitacion);
        }

        return response()->json(['successful' => true, 'message' => 'Asignación creada exitosamente']);
    }


    public function actualizarAsignacionEmpleadoCapacitacion(Request $request, $idEmpleado, $idCapacitacion)
    {
        $validator = Validator::make($request->all(), [
            'idEmpleado' => 'required|exists:empleado,idEmpleado',
            'idCapacitacion' => 'required|exists:capacitacion,idCapacitacion',
            // Agrega las reglas de validación para los campos que deseas actualizar (por ejemplo, 'nuevaInformacion').
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'error' => $validator->errors()], 400);
        }

        $asignacionCapacitacion = EmpleadoHasCapacitacion::where('idEmpleado', $idEmpleado)
            ->where('idCapacitacion', $idCapacitacion)
            ->first();

        if (!$asignacionCapacitacion) {
            return response()->json(['successful' => false, 'error' => 'Asignación de capacitacion no encontrada'], 404);
        }

        $asignacionCapacitacion->update($request->all());

        return response()->json(['successful' => true, 'data' => $asignacionCapacitacion]);
    }

    public function eliminarAsignacionEmpleadoCapacitacion($idEmpleado, $idCapacitacion)
    {
        $asignacionCapacitacion = EmpleadoHasCapacitacion::where('idEmpleado', $idEmpleado)
            ->where('idCapacitacion', $idCapacitacion)
            ->first();

        if (!$asignacionCapacitacion) {
            return response()->json(['successful' => false, 'error' => 'Asignación de capacitacion no encontrada'], 404);
        }

        $asignacionCapacitacion->delete();

        return response()->json(['successful' => true, 'message' => 'Asignación de capacitacion eliminada correctamente']);
    }


    public function listarCapacitacionesPorEmpleadoId($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $capacitacionesRealizadas = $empleado->capacitaciones;

        return response()->json(['successful' => true, 'capacitaciones' => $capacitacionesRealizadas]);
    }


    public function listarEmpleadosPorCapacitacionId($idCapacitacion)
    {
        $capacitacion = Capacitacion::find($idCapacitacion);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        $empleadosParticipantes = $capacitacion->empleados;

        return response()->json(['successful' => true, 'empleados' => $empleadosParticipantes]);
    }


    public function listarCapacitacionesNoRealizadasPorEmpleadoId($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $capacitacionesNoRealizadas = Capacitacion::whereDoesntHave('empleados', function ($query) use ($idEmpleado) {
            $query->where('empleado.idEmpleado', $idEmpleado);
        })->get();


        return response()->json(['successful' => true, 'capacitaciones' => $capacitacionesNoRealizadas]);
    }
}
