<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacion;
use Illuminate\Support\Facades\Validator;



/**
 * @OA\Info(
 *     title="Título que mostraremos en swagger", 
 *     version="1.0",
 *     description="Descripcion"
 * )
 *
 * @OA\Server(url="http://localhost:8000/api")
 */
class CapacitacionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/capacitaciones",
     *     summary="Obtiene lista de capacitaciones",
     *     @OA\Response(response="200", description="Respuesta exitosa")
     * )
     */
    public function listarCapacitaciones()
    {
        $capacitaciones = Capacitacion::all();
        return response()->json(['successful' => true, 'data' => $capacitaciones]);
    }


    /**
     * Muestra los detalles de una capacitación específica.
     *
     * @param  int  $id - ID de la capacitación
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la capacitación solicitada (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si la capacitación no fue encontrada.
     */
    public function mostrarCapacitacion($id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        return response()->json(['successful' => true, 'data' => $capacitacion]);
    }


    /**
     * Crea una nueva capacitación con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombre': Nombre de la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'descripcion': Descripción de la capacitación (cadena, obligatorio).
     *         - 'tipoEvento': Tipo de evento de la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'institucion': Institución relacionada con la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'cantidadHoras': Cantidad de horas de la capacitación (numérico, obligatorio).
     *         - 'fecha': Fecha de la capacitación (formato de fecha, obligatorio).
     *         - 'archivo': Archivo asociado a la capacitación (archivo, opcional, formatos permitidos: pdf, doc, docx).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la capacitación creada (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */


    public function crearCapacitacion(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipoEvento' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'cantidadHoras' => 'required|numeric',
            'fecha' => 'required|date',
            'archivo' => 'nullable|mimes:pdf,doc,docx',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si se proporcionó el archivo antes de intentar subirlo
        $archivoRuta = null;
        // Subir el archivo y obtener la ruta si se proporciona
        if ($request->hasFile('archivo')) {
            $archivoRuta = $request->file('archivo')->store('archivos/capacitaciones');
        }

        // Crear la capacitación con la ruta del archivo (puede ser null si no se proporciona)
        $capacitacion = Capacitacion::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'tipoEvento' => $request->input('tipoEvento'),
            'institucion' => $request->input('institucion'),
            'cantidadHoras' => $request->input('cantidadHoras'),
            'fecha' => $request->input('fecha'),
            'archivo' => $archivoRuta,
        ]);

        return response()->json(['successful' => true, 'data' => $capacitacion], 201);
    }



    /**
     * Actualiza los detalles de una capacitación existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID de la capacitación a actualizar (numérico, obligatorio).
     *         - 'nombre': Nuevo nombre de la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'descripcion': Nueva descripción de la capacitación (cadena, obligatorio).
     *         - 'tipoEvento': Nuevo tipo de evento de la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'institucion': Nueva institución relacionada con la capacitación (cadena, obligatorio, máximo 255 caracteres).
     *         - 'cantidadHoras': Nueva cantidad de horas de la capacitación (numérico, obligatorio).
     *         - 'fecha': Nueva fecha de la capacitación (formato de fecha, obligatorio).
     *         - 'archivo': Nuevo archivo asociado a la capacitación (archivo, opcional, formatos permitidos: pdf, doc, docx).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de la capacitación actualizada (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si la capacitación no fue encontrada.
     */
    public function actualizarCapacitacion(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
            'tipoEvento' => 'string|max:255',
            'institucion' => 'string|max:255',
            'cantidadHoras' => 'numeric',
            'fecha' => 'date',
            'archivo' => 'nullable|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        // Actualizar la capacitación con la ruta del archivo si se proporciona
        if ($request->hasFile('archivo')) {
            // Subir el archivo y obtener la ruta
            $archivoRuta = $request->file('archivo')->store('archivos/capacitaciones');
            // Actualizar la ruta del archivo en la base de datos
            $capacitacion->update(['archivo' => $archivoRuta]);
        }

        // Actualizar otros campos solo si se proporcionan en la solicitud
        $camposActualizar = [
            'nombre',
            'descripcion',
            'tipoEvento',
            'institucion',
            'cantidadHoras',
            'fecha',
        ];

        foreach ($camposActualizar as $campo) {
            if ($request->has($campo)) {
                $capacitacion->update([$campo => $request->input($campo)]);
            }
        }

        return response()->json(['successful' => true, 'data' => $capacitacion], 200);
    }

    /**
     * Elimina una capacitación existente.
     *
     * @param  int  $id - ID de la capacitación a eliminar
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si la capacitación no fue encontrada.
     */
    public function eliminarCapacitacion($id)
    {
        $capacitacion = Capacitacion::find($id);

        if (!$capacitacion) {
            return response()->json(['successful' => false, 'error' => 'Capacitación no encontrada'], 404);
        }

        $capacitacion->delete();

        return response()->json(['successful' => true, 'data' => ['message' => 'Capacitación eliminada correctamente']], 200);
    }
}
