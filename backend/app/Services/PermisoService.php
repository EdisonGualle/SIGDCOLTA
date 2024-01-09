<?php

namespace App\Services;

use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PermisoService
{
    public function listarPermisos()
    {
        $permisos = Permiso::all();
        return response()->json(['successful' => true, 'data' => $permisos]);
    }

    public function mostrarPermisoId($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:permiso,idPermiso',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $permiso = Permiso::findOrFail($id);
            return response()->json(['successful' => true, 'data' => $permiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }
    }

    public function crearPermiso(Request $request)
    {
        try {
            // Obtener el ID del empleado del request
            $idEmpleado = $request->input('idEmpleado');

            // Agregar la fecha y hora de solicitud al request
            $request->merge(['fechaSolicitud' => now()]);

            $validator = Validator::make($request->all(), [
                'idTipoPermiso' => 'required|numeric|exists:tipopermiso,idTipoPermiso',
                'motivo' => 'required|string',
                'fechaInicio' => 'required|date_format:Y-m-d H:i:s',
                'fechaFinaliza' => 'required|date_format:Y-m-d H:i:s',
                'tiempoPermiso' => 'required|numeric',
                'idEstadoPermiso' => 'required|numeric|exists:estadopermiso,idEstadoPermiso',
            ]);

            if ($validator->fails()) {
                return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
            }

            // Crear el permiso con el ID del empleado proporcionado en el request
            $permiso = Permiso::create($request->all());

            return response()->json(['successful' => true, 'data' => $permiso], 201);
        } catch (\Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante el proceso
            return response()->json(['successful' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function actualizarPermiso(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:permiso,idPermiso',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $permiso = Permiso::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'idEmpleado' => 'numeric|exists:empleado,idEmpleado',
                'idTipoPermiso' => 'numeric|exists:tipopermiso,idTipoPermiso',
                'motivo' => 'string',
                'fechaSolicitud' => 'date_format:Y-m-d H:i:s',
                'fechaInicio' => 'date_format:Y-m-d H:i:s',
                'fechaFinaliza' => 'date_format:Y-m-d H:i:s',
                'tiempoPermiso' => 'numeric',
                'idEstadoPermiso' => 'numeric|exists:estadopermiso,idEstadoPermiso',
            ]);

            if ($validator->fails()) {
                return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
            }

            $permiso->update($request->all());

            return response()->json(['successful' => true, 'data' => $permiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }
    }

    public function eliminarPermiso($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric|exists:permiso,idPermiso',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $permiso = Permiso::findOrFail($id);
            $permiso->delete();

            return response()->json(['successful' => true, 'message' => 'Permiso eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'Permiso no encontrado'], 404);
        }
    }
}
