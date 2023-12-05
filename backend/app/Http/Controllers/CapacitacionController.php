<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacion;

class CapacitacionController extends Controller
{
    public function index()
    {
        $capacitaciones = Capacitacion::all();
        return response()->json($capacitaciones);
    }

    public function show($id)
    {
        $capacitacion = Capacitacion::find($id);
        
        if (!$capacitacion) {
            return response()->json(['error' => 'Capacitación no encontrada'], 404);
        }

        return response()->json($capacitacion);
    }

    public function store(Request $request)
    {
        $capacitacion = Capacitacion::create($request->all());
        return response()->json($capacitacion, 201);
    }

    public function update(Request $request, $id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['error' => 'Capacitación no encontrada'], 404);
        }

        $capacitacion->update($request->all());

        return response()->json($capacitacion, 200);
    }

    public function destroy($id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['error' => 'Capacitación no encontrada'], 404);
        }

        $capacitacion->delete();

        return response()->json(['message' => 'Capacitación eliminada correctamente'], 200);
    }
}
