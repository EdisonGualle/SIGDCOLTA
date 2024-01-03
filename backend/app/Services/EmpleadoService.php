<?php

namespace App\Services;

use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoService
{
    public function listarEmpleados()
    {
        $empleados = Empleado::all();
        return ['successful' => true, 'data' => $empleados];
    }

    public function mostrarEmpleadoPorId($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return ['successful' => false, 'error' => 'Empleado no encontrado'];
        }

        return ['successful' => true, 'data' => $empleado];
    }

    public function listarEmpleadosPorDepartamentoId($idDepartamento)
    {
        $departamento = Departamento::find($idDepartamento);

        if (!$departamento) {
            return ['successful' => false, 'error' => 'Departamento no encontrado'];
        }

        $empleados = $departamento->empleados;

        return ['successful' => true, 'data' => $empleados];
    }

    public function listarEmpleadosPorEstadoId($idEstado)
    {
        $estado = Estado::find($idEstado);

        if (!$estado) {
            return ['successful' => false, 'error' => 'Estado no encontrado'];
        }

        $empleados = $estado->empleados;

        return ['successful' => true, 'data' => $empleados];
    }

    public function listarEmpleadosPorNacionalidad($nacionalidad)
    {
        $empleados = Empleado::where('nacionalidad', $nacionalidad)->get();

        if ($empleados->isEmpty()) {
            return ['successful' => false, 'error' => 'Empleados con esta nacionalidad no encontrados'];
        }

        return ['successful' => true, 'data' => $empleados];
    }

    public function listarEmpleadosPorGenero($genero)
    {
        $empleados = Empleado::where('Genero', $genero)->get();

        if ($empleados->isEmpty()) {
            return ['successful' => false, 'error' => 'Empleados con este género no encontrados'];
        }

        return ['successful' => true, 'data' => $empleados];
    }

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

    public function eliminarEmpleado($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return ['successful' => false, 'error' => 'Empleado no encontrado'];
        }

        $empleado->delete();

        return ['successful' => true, 'message' => 'Empleado eliminado correctamente'];
    }
}