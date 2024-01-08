<?php

namespace App\Services;

use App\Models\JerarquiaPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JerarquiaPermisoService
{
    public function listarJerarquiasPermiso()
    {
        $jerarquiasPermiso = JerarquiaPermiso::all();
        return response()->json(['successful' => true, 'data' => $jerarquiasPermiso]);
    }

    public function mostrarJerarquiaPermiso($idCargo, $idCargoAprobador)
    {
        if (!is_numeric($idCargo) || !is_numeric($idCargoAprobador)) {
            return response()->json(['successful' => false, 'error' => 'Los IDs deben ser números'], 422);
        }

        try {
            $jerarquiaPermiso = JerarquiaPermiso::where('idCargo', $idCargo)
                ->where('idCargoAprobador', $idCargoAprobador)
                ->firstOrFail();

            return response()->json(['successful' => true, 'data' => $jerarquiaPermiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'JerarquiaPermiso no encontrado'], 404);
        }
    }

    public function crearJerarquiaPermiso(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idCargo' => 'required|numeric|exists:cargo,idCargo',
            'idCargoAprobador' => 'required|numeric|exists:cargo,idCargo',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $jerarquiaPermiso = JerarquiaPermiso::create($request->all());

        return response()->json(['successful' => true, 'data' => $jerarquiaPermiso], 201);
    }

    public function actualizarJerarquiaPermiso(Request $request, $idCargo, $idCargoAprobador)
    {
        if (!is_numeric($idCargo) || !is_numeric($idCargoAprobador)) {
            return response()->json(['successful' => false, 'error' => 'Los IDs deben ser números'], 422);
        }

        try {
            $jerarquiaPermiso = JerarquiaPermiso::where('idCargo', $idCargo)
                ->where('idCargoAprobador', $idCargoAprobador)
                ->firstOrFail();

            $validator = Validator::make($request->all(), [
                'idCargo' => 'numeric|exists:cargo,idCargo',
                'idCargoAprobador' => 'numeric|exists:cargo,idCargo',
            ]);

            if ($validator->fails()) {
                return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
            }

            $jerarquiaPermiso->update($request->all());

            return response()->json(['successful' => true, 'data' => $jerarquiaPermiso]);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'JerarquiaPermiso no encontrado'], 404);
        }
    }

    public function eliminarJerarquiaPermiso($idCargo, $idCargoAprobador)
    {
        if (!is_numeric($idCargo) || !is_numeric($idCargoAprobador)) {
            return response()->json(['successful' => false, 'error' => 'Los IDs deben ser números'], 422);
        }

        try {
            $jerarquiaPermiso = JerarquiaPermiso::where('idCargo', $idCargo)
                ->where('idCargoAprobador', $idCargoAprobador)
                ->firstOrFail();

            $jerarquiaPermiso->delete();

            return response()->json(['successful' => true, 'message' => 'JerarquiaPermiso eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['successful' => false, 'error' => 'JerarquiaPermiso no encontrado'], 404);
        }
    }
}
