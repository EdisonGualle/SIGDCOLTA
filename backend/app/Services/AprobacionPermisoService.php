<?php

namespace App\Services;

use App\Models\AprobacionPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AprobacionPermisoService
{
    public function listarAprobacionesPermiso()
    {
        $aprobacionesPermiso = AprobacionPermiso::all();
        return response()->json(['successful' => true, 'data' => $aprobacionesPermiso]);
    }

    public function mostrarAprobacionPermiso($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:aprobacionpermiso,idAprobacionSolicitud',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $aprobacionPermiso = AprobacionPermiso::findOrFail($id);
            return response()->json(['successful' => true, 'data' => $aprobacionPermiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'AprobacionPermiso no encontrado'], 404);
        }
    }

    public function crearAprobacionPermiso(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idPermiso' => 'required|numeric|exists:permiso,idPermiso',
            'idEmpleadoAprobador' => 'required|numeric|exists:empleado,idEmpleado',
            'nivelAprobacion' => 'required|numeric',
            'fechaDecision' => 'required|date',
            'motivoRechazo' => 'nullable|string',
            'idEstadoPermiso' => 'required|numeric|exists:estadopermiso,idEstadoPermiso',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $aprobacionPermiso = AprobacionPermiso::create($request->all());

        return response()->json(['successful' => true, 'data' => $aprobacionPermiso], 201);
    }

    public function actualizarAprobacionPermiso(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:aprobacionpermiso,idAprobacionSolicitud',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $aprobacionPermiso = AprobacionPermiso::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'idPermiso' => 'numeric|exists:permiso,idPermiso',
                'idEmpleadoAprobador' => 'numeric|exists:empleado,idEmpleado',
                'nivelAprobacion' => 'numeric',
                'fechaDecision' => 'date',
                'motivoRechazo' => 'nullable|string',
                'idEstadoPermiso' => 'numeric|exists:estadopermiso,idEstadoPermiso',
            ]);

            if ($validator->fails()) {
                return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
            }

            $aprobacionPermiso->update($request->all());

            return response()->json(['successful' => true, 'data' => $aprobacionPermiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'AprobacionPermiso no encontrado'], 404);
        }
    }

    public function eliminarAprobacionPermiso($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:aprobacionpermiso,idAprobacionSolicitud',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $aprobacionPermiso = AprobacionPermiso::findOrFail($id);
            $aprobacionPermiso->delete();

            return response()->json(['successful' => true, 'message' => 'AprobacionPermiso eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'AprobacionPermiso no encontrado'], 404);
        }
    }
}
