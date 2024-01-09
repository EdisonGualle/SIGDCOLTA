<?php
namespace App\Services;


use App\Models\Cantones; // Agregado el uso del modelo Provincia

class CantonesService
{

    public function listarCantones()
    {
        $cantones = Cantones::all();
        return response()->json(['successful' => true, 'data' => $cantones]);
    }
    public function mostrarCantones($id)
    {
        $cantones = Cantones::find($id);

        if (!$cantones) {
            return response()->json(['successful' => false, 'error' => 'canton no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $cantones]);
    }
   
}
