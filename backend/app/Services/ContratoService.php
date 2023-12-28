<?php

namespace App\Services;

use App\Models\Contrato;
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
        $contratos = Contrato::select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')->get();
        return response()->json(['successful' => true, 'data' => $contratos]);
    }

    public function mostrarContrato($id)
    {
        $contrato = Contrato::select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')->find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $contrato]);
    }

    public function listarContratosPorCedula($cedula)
    {
        $contratos = Contrato::whereHas('empleados', function ($query) use ($cedula) {
            $query->where('cedula', $cedula);
        })->select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }

    public function listarContratosPorIdEmpleado($idEmpleado)
    {
        $contratos = Contrato::where('idEmpleado', $idEmpleado)
            ->select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')
            ->get();
        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorIdTipoContrato($idTipoContrato)
    {
        $contratos = Contrato::where('idTipoContrato', $idTipoContrato)
            ->select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')
            ->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }


    public function listarContratosPorNombreTipoContrato($nombreTipoContrato)
    {
        $contratos = Contrato::whereHas('tiposContrato', function ($query) use ($nombreTipoContrato) {
            $query->where('nombre', $nombreTipoContrato);
        })->select('idContrato', 'fechaInicio', 'fechaFin', 'idTipoContrato', 'idEmpleado')->get();

        return response()->json(['successful' => true, 'data' => $contratos]);
    }



    public function crearContrato(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'idEmpleado' => 'required|numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'required|numeric|exists:tipocontrato,idTipoContrato',
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.'
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $contrato = Contrato::create($request->all());

        return response()->json(['successful' => true, 'data' => $contrato], 201);
    }

    public function actualizarContrato(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fechaInicio' => 'date',
            'fechaFin' => 'date',
            'idEmpleado' => 'numeric|exists:empleado,idEmpleado',
            'idTipoContrato' => 'numeric|exists:tipocontrato,idTipoContrato',
        ], [
            'idEmpleado.exists' => 'El empleado especificado no existe.',
            'idTipoContrato.exists' => 'El tipo de contrato especificado no existe.'
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $contrato = Contrato::find($id);

        if (!$contrato) {
            return response()->json(['successful' => false, 'error' => 'Contrato no encontrado'], 404);
        }

        $contrato->update($request->all());

        return response()->json(['successful' => true, 'data' => $contrato]);
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
