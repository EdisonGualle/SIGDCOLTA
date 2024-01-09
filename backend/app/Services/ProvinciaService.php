<?php
namespace App\Services;


use App\Models\Provincia; // Agregado el uso del modelo Provincia

class ProvinciaService
{

    public function listarProvincia()
    {
        $provincia = Provincia::all();
        return response()->json(['successful' => true, 'data' => $provincia]);
    }
    public function mostrarProvincia($id)
    {
        $provincia = Provincia::find($id);

        if (!$provincia) {
            return response()->json(['successful' => false, 'error' => 'Provincia no encontrada']);
        }

        return response()->json(['successful' => true, 'data' => $provincia]);
    }
   
}
