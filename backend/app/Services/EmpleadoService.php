<?php

namespace App\Services;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Direccion;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function listarEmpleadosPorDireccionId($idDireccion)
    {
        $empleados = DB::table('empleado')
            ->join('cargo', 'empleado.idCargo', '=', 'cargo.idCargo')
            ->join('unidad', 'cargo.idUnidad', '=', 'unidad.idUnidad')
            ->join('direcciones', 'unidad.idDireccion', '=', 'direcciones.idDireccion')
            ->where('direcciones.idDireccion', $idDireccion)
            ->select('empleado.*')
            ->get();

        if ($empleados->isEmpty()) {
            return ['successful' => false, 'error' => 'Empleados no encontrados para la dirección especificada'];
        }

        return ['successful' => true, 'data' => $empleados];
    }

    public function listarEmpleadosPorUnidadId($idUnidad)
    {
        $empleados = DB::table('empleado')
            ->join('cargo', 'empleado.idCargo', '=', 'cargo.idCargo')
            ->join('unidad', 'cargo.idUnidad', '=', 'unidad.idUnidad')
            ->where('unidad.idUnidad', $idUnidad)
            ->select('empleado.*')
            ->get();

        if ($empleados->isEmpty()) {
            return ['successful' => false, 'error' => 'Empleados no encontrados para la unidad especificada'];
        }

        return ['successful' => true, 'data' => $empleados];
    }

    // Logica de cargos 
    
    public function listarEmpleadosPorCargoId($idCargo)
    {
        $cargo = Cargo::find($idCargo);

        if (!$cargo) {
            return ['successful' => false, 'error' => 'Cargo no encontrado'];
        }

        $empleados = $cargo->empleados;

        return ['successful' => true, 'data' => $empleados];
    }

    public function asignarCargo(Request $request, $idEmpleado)
    {
        $validator = Validator::make($request->all(), [
            'idCargo' => 'required|exists:cargo,idCargo',
        ]);

        if ($validator->fails()) {
            return response()->json(['successful' => false, 'errors' => $validator->errors()], 422);
        }

        $empleado = Empleado::find($idEmpleado);

        if (!$empleado) {
            return response()->json(['successful' => false, 'error' => 'Empleado no encontrado'], 404);
        }

        $idCargo = $request->input('idCargo');
        $cargo = Cargo::find($idCargo);

        if (!$cargo) {
            return response()->json(['successful' => false, 'error' => 'Cargo no encontrado'], 404);
        }

        // Asignar el cargo al empleado
        $empleado->cargo()->associate($cargo);
        $empleado->save();

        return response()->json(['successful' => true, 'message' => 'Cargo asignado correctamente al empleado']);
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
            'cedula' => 'required|numeric|unique:empleado|between:10,12',
            'primerNombre' => 'required|string',
            'segundoNombre' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'required|string',
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
            'idCargo' => 'required|numeric|exists:cargo,idCargo',
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
            'primerNombre' => 'string',
            'segundoNombre' => 'string',
            'primerApellido' => 'string',
            'segundoApellido' => 'string',
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
            'idCargo' => 'numeric|exists:cargo,idCargo',
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
