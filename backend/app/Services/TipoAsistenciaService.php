<?php

namespace App\Services;

use App\Models\TipoAsistencia;
use Illuminate\Http\Request;

class TipoAsistenciaService
{
    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarTiposAsistencia()
    {
        $tiposAsistencia = TipoAsistencia::all();
        return response()->json(['successful' => true, 'data' => $tiposAsistencia], 200);
    }

    public function mostrarTipoAsistenciaPorId($id)
    {
        $tipoAsistencia = TipoAsistencia::find($id);

        if (!$tipoAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Asistencia no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $tipoAsistencia], 200);
    }

    public function eliminarTipoAsistencia($id)
    {
        $tipoAsistencia = TipoAsistencia::find($id);

        if (!$tipoAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Asistencia no encontrado'], 404);
        }

        $tipoAsistencia->delete();

        return response()->json(['successful' => true, 'message' => 'Tipo de Asistencia eliminado correctamente'], 200);
    }

    public function crearTipoAsistencia(Request $request)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'tipo' => 'required|unique:tipos_asistencia,tipo',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear un nuevo tipo de asistencia
        $tipoAsistencia = new TipoAsistencia([
            'tipo' => $request->tipo,
        ]);

        $tipoAsistencia->save();

        return response()->json(['successful' => true, 'message' => 'Tipo de Asistencia creado correctamente'], 200);
    }

    public function actualizarTipoAsistencia(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = $this->validator->make($request->all(), [
            'tipo' => 'required|unique:tipos_asistencia,tipo,' . $id,
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Buscar el tipo de asistencia a actualizar
        $tipoAsistencia = TipoAsistencia::find($id);

        if (!$tipoAsistencia) {
            return response()->json(['successful' => false, 'error' => 'Tipo de Asistencia no encontrado'], 404);
        }

        // Actualizar el tipo de asistencia
        $tipoAsistencia->tipo = $request->tipo;
        $tipoAsistencia->save();

        return response()->json(['successful' => true, 'message' => 'Tipo de Asistencia actualizado correctamente'], 200);
    }
}
