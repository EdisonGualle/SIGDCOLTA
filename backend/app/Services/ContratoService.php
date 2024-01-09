<?php

namespace App\Services;

use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\EstadoContrato;
use App\Models\TipoContrato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoService
{
    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarContratos()
    {
        $contratos = Contrato::all();
        return response()->json(['successful' => true, 'data' => $contratos]);
    }

    public function mostrarContrato($id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $contrato]);
    }

    public function listarContratosPorCedula($cedula)
    {
        $contratos = Contrato::whereHas('empleados', function ($query) use ($cedula) {
            $query->where('cedula', $cedula);
        })->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorEstado($estadoContrato)
    {
        $contratos = Contrato::where('estadoContrato', $estadoContrato)->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorIdEmpleado($idEmpleado)
    {
        $contratos = Contrato::where('idEmpleado', $idEmpleado)
            ->get();
        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorIdTipoContrato($idTipoContrato)
    {
        $contratos = Contrato::where('idTipoContrato', $idTipoContrato)
            ->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorNombreTipoContrato($nombreTipoContrato)
    {
        $contratos = Contrato::whereHas('tiposContrato', function ($query) use ($nombreTipoContrato) {
            $query->where('nombre', $nombreTipoContrato);
        })->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function crearContrato(Request $request)
    {
        // Reglas de validación
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'required|numeric|exists:tipocontrato,idTipoContrato',
            'archivo' => 'nullable|file',
            'salario' => 'required|numeric',
            'estadoContrato' => [
                'required',
                'nullable',
                'string',
                'max:200',
                function ($attribute, $value, $fail) {
                    $exists = EstadoContrato::where('estadoContrato', $value)->exists();
                    if (!$exists) {
                        $fail('El estadoContrato especificado no existe en la tabla estadocontrato.');
                    }
                },
            ],
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
        ]);

        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si el empleado ya tiene un contrato en el mismo rango de fechas
        $conflict = Contrato::where('idEmpleado', $request->input('idEmpleado'))
            ->where(function ($query) use ($request) {
                $query->whereBetween('fechaInicio', [$request->input('fechaInicio'), $request->input('fechaFin')])
                    ->orWhereBetween('fechaFin', [$request->input('fechaInicio'), $request->input('fechaFin')]);
            })
            ->exists();

        if ($conflict) {
            return response()->json(['successful' => false, 'errors' => ['conflict' => 'El empleado ya tiene un contrato en el mismo rango de fechas.']], 422);
        }

        // Calcular la diferencia de meses
        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $duracionMeses = $fechaInicio->diffInMonths($fechaFin);

        // Validar la duración del contrato en relación con tipoContrato.duracionMeses
        $tipoContrato = TipoContrato::find($request->input('idTipoContrato'));
        if ($tipoContrato && $tipoContrato->duracionMeses >= $duracionMeses) {
            return response()->json(['successful' => false, 'errors' => ['duracion' => 'La duración del contrato debe ser mayor o igual a ' . $tipoContrato->duracionMeses . ' meses.']], 422);
        }

        // Crear el contrato
        $contrato = Contrato::create($request->all());

        // Respuesta exitosa
        return response()->json(['successful' => true, 'data' => $contrato], 201);
    }


    public function actualizarContrato(Request $request, $id)
    {
        // Reglas de validación
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'required|numeric|exists:tipocontrato,idTipoContrato',
            'archivo' => 'nullable|file',
            'salario' => 'required|numeric',
            'estadoContrato' => [
                'required',
                'nullable',
                'string',
                'max:200',
                function ($attribute, $value, $fail) {
                    $exists = EstadoContrato::where('estadoContrato', $value)->exists();
                    if (!$exists) {
                        $fail('El estadoContrato especificado no existe en la tabla estadocontrato.');
                    }
                },
            ],
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.',
            'fechaFin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
        ]);

        // Manejo de errores de validación
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si el empleado ya tiene un contrato en el mismo rango de fechas
        $conflict = Contrato::where('idEmpleado', $request->input('idEmpleado'))
            ->where(function ($query) use ($request) {
                $query->whereBetween('fechaInicio', [$request->input('fechaInicio'), $request->input('fechaFin')])
                    ->orWhereBetween('fechaFin', [$request->input('fechaInicio'), $request->input('fechaFin')]);
            })
            ->where('id', '<>', $id) // Excluir el contrato actual durante la actualización
            ->exists();

        if ($conflict) {
            return response()->json(['successful' => false, 'errors' => ['conflict' => 'El empleado ya tiene un contrato en el mismo rango de fechas.']], 422);
        }

        // Calcular la diferencia de meses
        $fechaInicio = Carbon::parse($request->input('fechaInicio'));
        $fechaFin = Carbon::parse($request->input('fechaFin'));
        $duracionMeses = $fechaInicio->diffInMonths($fechaFin);

        // Validar la duración del contrato en relación con tipoContrato.duracionMeses
        $tipoContrato = TipoContrato::find($request->input('idTipoContrato'));
        if ($tipoContrato && $tipoContrato->duracionMeses >= $duracionMeses) {
            return response()->json(['successful' => false, 'errors' => ['duracion' => 'La duración del contrato debe ser mayor o igual a ' . $tipoContrato->duracionMeses . ' meses.']], 422);
        }

        // Actualizar el contrato
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'errors' => ['contrato' => 'Contrato no encontrado.']], 404);
        }

        $contrato->update($request->all());

        // Respuesta exitosa
        return response()->json(['successful' => true, 'data' => $contrato], 200);
    }



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
