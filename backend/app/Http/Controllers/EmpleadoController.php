<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Lista todos los empleados.
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de todos los empleados (array) si la operación fue exitosa.
     */
    public function listarEmpleados()
    {
        $empleados = Empleado::all();
        return response()->json(['successful' => true, 'data' => $empleados]);
    }

    /**
     * Muestra los detalles de un empleado específico.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del empleado (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del empleado solicitado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el empleado no fue encontrado.
     */
    public function mostrarEmpleado($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $empleado]);
    }

    /**
     * Crea un nuevo empleado con los datos proporcionados en la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - Atributos del empleado (ver lista en la descripción).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del empleado creado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     */
    public function crearEmpleado(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'cedula' => 'required|numeric|unique:empleado',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'fechaNacimiento' => 'required|date',
            'genero' => 'required|string',
            'telefonoPersonal' => 'required|string',
            'telefonoTrabajo' => 'required|string',
            'correo' => 'required|email|unique:empleado',
            'etnia' => 'required|string',
            'estadoCivil' => 'required|string',
            'tipoSangre' => 'required|string',
            'nacionalidad' => 'required|string',
            'provinciaNacimiento' => 'required|string',
            'ciudadNacimiento' => 'required|string',
            'cantonNacimiento' => 'required|string',
            'idDepartamento' => 'required|numeric|exists:departamento,idDepartamento',
            'idCargo' => 'required|numeric|exists:cargo,idCargo',
            'idEstado' => 'required|numeric|exists:estado,idEstado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Crear el empleado
        $empleado = Empleado::create($request->all());

        return response()->json(['successful' => true, 'data' => $empleado], 201);
    }

    /**
     * Actualiza los detalles de un empleado existente.
     *
     * @param  \Illuminate\Http\Request  $request
     *         Parámetros de entrada:
     *         - 'id': ID del empleado a actualizar (numérico, obligatorio).
     *         - Atributos del empleado a actualizar (ver lista en la descripción, opcionales).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos del empleado actualizado (array) si la operación fue exitosa.
     *         - 'errors': Detalles de los errores de validación (array) si la operación falló.
     *         - 'error': Mensaje de error (cadena) si el empleado no fue encontrado.
     */
    public function actualizarEmpleado(Request $request, $id)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'cedula' => 'numeric|unique:empleado,cedula,' . $id . ',idEmpleado|digits_between:10,12 ',
            'nombre' => 'string',
            'apellido' => 'string',
            'fechaNacimiento' => 'date',
            'Genero' => 'string',
            'telefonoPersonal' => 'string',
            'telefonoTrabajo' => 'nullable|string',
            'correo' => 'email|unique:empleado,correo,' . $id . ',idEmpleado',
            'etnia' => 'nullable|string',
            'estadoCivil' => 'nullable|string',
            'tipoSangre' => 'nullable|string',
            'nacionalidad' => 'string',
            'provinciaNacimiento' => 'nullable|string',
            'ciudadNacimiento' => 'nullable|string',
            'cantonNacimiento' => 'nullable|string',
            'idDepartamento' => 'numeric|exists:departamento,idDepartamento',
            'idCargo' => 'numeric|exists:cargo,idCargo',
            'idEstado' => 'numeric|exists:estado,idEstado',
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Actualizar el empleado
        $empleado->update($request->all());

        return response()->json(['successful' => true, 'data' => $empleado]);
    }

    /**
     * Elimina un empleado existente.
     *
     * @param  int  $id
     *         Parámetros de entrada:
     *         - 'id': ID del empleado a eliminar (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'message': Mensaje de éxito o error (cadena).
     *         - 'error': Mensaje de error (cadena) si el empleado no fue encontrado.
     */
    public function eliminarEmpleado($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $empleado->delete();

        return response()->json(['successful' => true, 'message' => 'Empleado eliminado correctamente']);
    }


    /**
     * Obtiene los empleados de un departamento específico.
     *
     * @param  int  $idDepartamento
     *         Parámetros de entrada:
     *         - 'idDepartamento': ID del departamento (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de los empleados del departamento (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el departamento no fue encontrado.
     */
    public function obtenerEmpleadosPorDepartamento($idDepartamento)
    {
        $departamento = Departamento::find($idDepartamento);

        if (!$departamento) {
            return response()->json(['successful' => false, 'error' => 'Departamento no encontrado'], 404);
        }

        $empleados = $departamento->empleados;

        return response()->json(['successful' => true, 'data' => $empleados]);
    }

    /**
     * Obtiene los empleados con un estado específico.
     *
     * @param  int  $idEstado
     *         Parámetros de entrada:
     *         - 'idEstado': ID del estado (numérico, obligatorio).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de los empleados con el estado especificado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el estado no fue encontrado.
     */
    public function obtenerEmpleadosPorEstado($idEstado)
    {
        $estado = Estado::find($idEstado);

        if (!$estado) {
            return response()->json(['successful' => false, 'error' => 'Estado no encontrado'], 404);
        }

        $empleados = $estado->empleados;

        return response()->json(['successful' => true, 'data' => $empleados]);
    }

    /**
     * Obtiene los empleados de una nacionalidad específica.
     *
     * @param  string  $nacionalidad
     *         Parámetros de entrada:
     *         - 'nacionalidad': Nacionalidad de los empleados (cadena, obligatoria).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de los empleados con la nacionalidad especificada (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si la nacionalidad no fue encontrada.
     */
    public function obtenerEmpleadosPorNacionalidad($nacionalidad)
    {
        $empleados = Empleado::where('nacionalidad', $nacionalidad)->get();

        if ($empleados->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'Empleados con esta nacionalidad no encontrados'], 404);
        }

        return response()->json(['successful' => true, 'data' => $empleados]);
    }

    /**
     * Obtiene los empleados con género específico.
     *
     * @param  string  $genero
     *         Parámetros de entrada:
     *         - 'genero': Género de los empleados (cadena, obligatoria).
     *
     * @return \Illuminate\Http\JsonResponse
     *         Parámetros de salida:
     *         - 'successful': Indica si la operación fue exitosa (booleano).
     *         - 'data': Datos de los empleados con el género especificado (array) si la operación fue exitosa.
     *         - 'error': Mensaje de error (cadena) si el género no fue encontrado.
     */
    public function obtenerEmpleadosPorGenero($genero)
    {
        $empleados = Empleado::where('Genero', $genero)->get();

        if ($empleados->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'Empleados con este género no encontrados'], 404);
        }

        return response()->json(['successful' => true, 'data' => $empleados]);
    }
}
