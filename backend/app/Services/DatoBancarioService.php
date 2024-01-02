<?php

namespace App\Services;

use App\Models\DatoBancario;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DatoBancarioService
{
    protected $validator;

    public function __construct(\Illuminate\Contracts\Validation\Factory $validator)
    {
        $this->validator = $validator;
    }

    public function listarDatosBancarios()
    {
        $datosBancarios = DatoBancario::all();
        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    public function mostrarDatoBancarioPorId($id)
    {
        $datoBancario = DatoBancario::find($id);

        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $datoBancario], 200);
    }

    public function listarDatosBancariosPorIdEmpleado($idEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener los números de cuenta asociados al empleado
        $datosBancarios = DatoBancario::where('idEmpleado', $idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    public function listarDatosBancariosPorCedulaEmpleado($cedulaEmpleado)
    {
        // Verificar si el empleado existe
        $empleado = Empleado::where('cedula', $cedulaEmpleado)->first();

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        // Obtener los datos bancarios asociados al empleado
        $datosBancarios = DatoBancario::where('idEmpleado', $empleado->idEmpleado)->get();

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    public function listarDatosBancariosPorNombreBanco($nombreBanco)
    {
        // Obtener los datos bancarios asociados al banco
        $datosBancarios = DatoBancario::where('nombreBanco', $nombreBanco)->get();

        // Verificar si se encontraron datos bancarios para el banco especificado
        if ($datosBancarios->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'No se encontraron datos bancarios para el banco especificado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    public function listarDatosBancariosPorTipoCuenta($tipoCuenta)
    {
        // Obtener los datos bancarios asociados al tipo de cuenta
        $datosBancarios = DatoBancario::where('tipoCuenta', $tipoCuenta)->get();

        // Verificar si se encontraron datos bancarios para el tipo de cuenta especificado
        if ($datosBancarios->isEmpty()) {
            return response()->json(['successful' => false, 'error' => 'No se encontraron datos bancarios para el tipo de cuenta especificado'], 404);
        }

        return response()->json(['successful' => true, 'data' => $datosBancarios], 200);
    }

    public function crearDatoBancario(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombreBanco' => 'required|string|max:255',
            'numeroCuenta' => 'required|string',
            'tipoCuenta' => 'required|string|max:255',
            'idEmpleado' => 'required|numeric|exists:empleados,idEmpleado',
        ], [
            'idEmpleado.exists' => 'No existe el empleado especificado'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe una cuenta bancaria con el mismo número para el empleado
        $existingDatoBancario = DatoBancario::where('numeroCuenta', $request->numeroCuenta)
            ->where('idEmpleado', $request->idEmpleado)
            ->first();

        if ($existingDatoBancario) {
            return response()->json(['successful' => false, 'error' => 'Ya existe una cuenta bancaria con el mismo número para este empleado'], 422);
        }

        // Crear el dato bancario
        $datoBancario = DatoBancario::create($request->all());

        return response()->json(['successful' => true, 'data' => $datoBancario], 201);
    }

    public function actualizarDatoBancario(Request $request, $id)
    {
        // Obtener el dato bancario existente
        $datoBancario = DatoBancario::find($id);

        // Verificar si el dato bancario existe
        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombreBanco' => 'string|max:255',
            'numeroCuenta' => 'string',
            'tipoCuenta' => 'string|max:255',
            'idEmpleado' => 'numeric|exists:empleados,idEmpleado',
        ], [
            'idEmpleado.exists' => 'No existe el empleado edpecificado'
        ]);

        // Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe una cuenta bancaria con el mismo número para el mismo empleado
        $existingDatoBancario = DatoBancario::where('numeroCuenta', $request->numeroCuenta)
            ->where('idEmpleado', $request->idEmpleado)
            ->where('idDatoBancario', '!=', $id) // Excluir el dato bancario actual en la búsqueda
            ->first();

        if ($existingDatoBancario) {
            return response()->json(['successful' => false, 'error' => 'Ya existe una cuenta bancaria con el mismo número para este empleado'], 422);
        }

        // Actualizar el dato bancario
        $datoBancario->update($request->all());

        return response()->json(['successful' => true, 'data' => $datoBancario], 200);
    }

    public function eliminarDatoBancario($id)
    {
        // Buscar el dato bancario a eliminar
        $datoBancario = DatoBancario::find($id);

        // Si el dato bancario no existe, retornar un mensaje de error
        if (!$datoBancario) {
            return response()->json(['successful' => false, 'error' => 'Dato Bancario no encontrado'], 404);
        }

        // Eliminar el dato bancario
        $datoBancario->delete();

        return response()->json(['successful' => true, 'message' => 'Dato Bancario eliminado correctamente'], 200);
    }
}
