<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Facades\Validator;

class CargoController extends Controller
{
    /**
     * Lista todos los cargos.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los cargos (array) si la operación fue exitosa.
     */
    public function listarCargos()
    {
        $cargos = Cargo::all();
        return response()->json(['successful' => true, 'data' => $cargos]);
    }


    /**
     * Muestra los detalles de un cargo específico.
     *
     * @param  int  $id - ID del cargo
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del cargo solicitado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el cargo no fue encontrado.
     */
    public function mostrarCargo($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        return response()->json(['successful' => true, 'data' => $cargo]);
    }


    /**
     * Crea un nuevo cargo con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'nombre': Nombre del cargo (cadena, obligatorio, máximo 255 caracteres).
     *         - 'descripcion': Descripción del cargo (cadena, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del cargo creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearCargo(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:cargo',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el cargo
        $cargo = Cargo::create($request->all());

        return response()->json(['successful' => true, 'data' => $cargo], 201);
    }


    /**
     * Actualiza los detalles de un cargo existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID del cargo a actualizar (numérico, obligatorio).
     *         - 'nombre': Nuevo nombre del cargo (cadena, obligatorio, máximo 255 caracteres).
     *         - 'descripcion': Nueva descripción del cargo (cadena, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del cargo actualizado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si el cargo no fue encontrado.
     */
    public function actualizarCargo(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:cargo',
            'descripcion' => 'required|string',
        ], [
            'nombre.unique' => 'Ya existe un cargo con este nombre.',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        // Actualizar el cargo
        $cargo->update($request->all());

        return response()->json(['successful' => true, 'data' => $cargo]);
    }


    /**
     * Elimina un cargo existente.
     *
     * @param  int  $id - ID del cargo a eliminar
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si el cargo no fue encontrado.
     */
    public function eliminarCargo($id)
    {
        $cargo = Cargo::find($id);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado']);
        }

        $cargo->delete();

        return response()->json(['successful' => true, 'message' => 'Cargo eliminado correctamente']);
    }
}
