<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\AuthController;


use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ControlDiarioController;
use App\Http\Controllers\DatoBancarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoHasCapacitacionController;
use App\Http\Controllers\EmpleadoHasDiscapacidadController;
use App\Http\Controllers\EmpleadoHasInstruccionFormalController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EvaluacionDesempenoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\InstruccionFormalController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ReferenciaLaboralController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SalidaCampoController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\TipoPermisoController;
use App\Http\Controllers\TipoSalidaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/capacitaciones', [CapacitacionController::class, 'listarCapacitaciones']);



Route::get('/capacitaciones-instruccionesformales', [EmpleadoHasInstruccionFormalController::class, 'listarInstruccionesFormalesEmpleado']);


// CARGOS routes
Route::group(['middleware' => ['auth:sanctum', 'role:Admin|Empleado']], function () {
    // Rutas AUTH
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'mostrarCapacitacion']);



    // CAPACITACIONES routes
    Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'mostrarCapacitacion']);
    Route::post('/capacitaciones', [CapacitacionController::class, 'crearCapacitacion']);
    Route::put('/capacitaciones/{id}', [CapacitacionController::class, 'actualizarCapacitacion']);
    Route::delete('/capacitaciones/{id}', [CapacitacionController::class, 'eliminarCapacitacion']);

    // CAPACITACIONES HAS EMPLEADOS routes
    Route::get('/capacitaciones-empleados', [EmpleadoHasCapacitacionController::class, 'listarCapacitacionesDeEmpleados']);
    Route::post('/capacitaciones-empleados', [EmpleadoHasCapacitacionController::class, 'crearAsignacionCapacitacion']);
    Route::put('/capacitaciones-empleados', [EmpleadoHasCapacitacionController::class, 'actualizarAsignacionCapacitacion']);
    Route::delete('/capacitaciones-empleados', [EmpleadoHasCapacitacionController::class, 'eliminarAsignacionCapacitacion']);
    Route::get('/capacitaciones-empleados/capacitaciones-por-empleado/{idEmpleado}', [EmpleadoHasCapacitacionController::class, 'listarCapacitacionesPorEmpleado']);
    Route::get('/capacitaciones-empleados/total-capacitaciones-por-empleado', [EmpleadoHasCapacitacionController::class, 'obtenerTotalCapacitacionesPorEmpleado']);
    Route::get('/capacitaciones-empleados/capacitaciones-no-realizadas/{idEmpleado}', [EmpleadoHasCapacitacionController::class, 'capacitacionesNoRealizadasPorEmpleado']);
    Route::get('/capacitaciones-empleados/empleados-por-capacitacion/{idCapacitacion}', [EmpleadoHasCapacitacionController::class, 'listarEmpleadosPorCapacitacion']);
    Route::get('/capacitaciones-empleados/capacitaciones-ordenadas-por-fecha', [EmpleadoHasCapacitacionController::class, 'listarCapacitacionesOrdenadasPorFecha']);
    Route::get('/capacitaciones-empleados/empleados-capacitaciones-rangoFechas/{fechaInicio}/{fechaFin}', [EmpleadoHasCapacitacionController::class, 'empleadosEnCapacitacionesEnRangoDeFechas']);


    Route::get('/cargos', [CargoController::class, 'listarCargos']);
    Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']);
    Route::post('/cargos', [CargoController::class, 'crearCargo']);
    Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']);
    Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']);




    // CONTRATOS routes
    Route::get('/contratos', [ContratoController::class, 'listarContratos']);
    Route::get('/contratos/{id}', [ContratoController::class, 'mostrarContrato']);
    Route::post('/contratos', [ContratoController::class, 'crearContrato']);
    Route::put('/contratos/{id}', [ContratoController::class, 'actualizarContrato']);
    Route::delete('/contratos/{id}', [ContratoController::class, 'eliminarContrato']);
    Route::get('/contratosActivos', [ContratoController::class, 'contratosActivos']);


    // CONTROL DIARIO routes
    Route::get('/controlDiario', [ControlDiarioController::class, 'listarControlDiarios']);
    Route::get('/controlDiario/{id}', [ControlDiarioController::class, 'mostrarControlDiario']);
    Route::post('/controlDiario', [ControlDiarioController::class, 'crearControlDiario']);
    Route::put('/controlDiario/{id}', [ControlDiarioController::class, 'actualizarControlDiario']);
    Route::delete('/controlDiario/{id}', [ControlDiarioController::class, 'eliminarControlDiario']);

    Route::get('/controlDiario/empleado/{idEmpleado}', [ControlDiarioController::class, 'controlesDiariosEmpleado']);
    Route::get('/controlDiario/fecha/{fecha}', [ControlDiarioController::class, 'controlesDiariosFecha']);
    Route::get('/controlDiario/rangoFechas/{fechaInicio}/{fechaFin}', [ControlDiarioController::class, 'controlesDiariosRangoFechas']);
    Route::get('/controlDiario/totalHoras/{idEmpleado}/{fechaInicio}/{fechaFin}', [ControlDiarioController::class, 'totalHorasTrabajadas']);
    Route::get('/controlDiario/ultimoControlDiario/{idEmpleado}', [ControlDiarioController::class, 'ultimoControlDiario']);
    Route::get('/controlDiario/promedioHoras/{idEmpleado}/{fechaInicio}/{fechaFin}', [ControlDiarioController::class, 'promedioHorasTrabajadas']);



    // DATOS BANCARIOS routes
    Route::get('/datosBancarios', [DatoBancarioController::class, 'listarDatosBancarios']);
    Route::get('/datosBancarios/{id}', [DatoBancarioController::class, 'mostrarDatoBancario']);
    Route::post('/datosBancarios', [DatoBancarioController::class, 'crearDatoBancario']);
    Route::put('/datosBancarios/{id}', [DatoBancarioController::class, 'actualizarDatoBancario']);
    Route::delete('/datosBancarios/{id}', [DatoBancarioController::class, 'eliminarDatoBancario']);
    Route::get('/datosBancarios/numerosCuentaEmpleado/{idEmpleado}', [DatoBancarioController::class, 'numerosCuentaEmpleado']);
    Route::get('/datosBancarios/datosBancariosPorBanco/{nombreBanco}', [DatoBancarioController::class, 'datosBancariosPorBanco']);
    Route::get('/datosBancarios/datosBancariosPorTipoCuenta/{tipoCuenta}', [DatoBancarioController::class, 'datosBancariosPorTipoCuenta']);


    // DEPARTAMENTOS routes
    Route::get('/departamentos', [DepartamentoController::class, 'listarDepartamentos']);
    Route::get('/departamentos/{id}', [DepartamentoController::class, 'mostrarDepartamento']);
    Route::post('/departamentos', [DepartamentoController::class, 'crearDepartamento']);
    Route::put('/departamentos/{id}', [DepartamentoController::class, 'actualizarDepartamento']);
    Route::delete('/departamentos/{id}', [DepartamentoController::class, 'eliminarDepartamento']);
    Route::get('/departamentos/departamentosPorUnidad/{idUnidad}', [DepartamentoController::class, 'departamentosPorUnidad']);




    // DISCAPACIDADES routes
    Route::get('/discapacidades', [DiscapacidadController::class, 'listarDiscapacidades']);
    Route::get('/discapacidades/{id}', [DiscapacidadController::class, 'mostrarDiscapacidad']);
    Route::post('/discapacidades', [DiscapacidadController::class, 'crearDiscapacidad']);
    Route::put('/discapacidades/{id}', [DiscapacidadController::class, 'actualizarDiscapacidad']);
    Route::delete('/discapacidades/{id}', [DiscapacidadController::class, 'eliminarDiscapacidad']);
    Route::get('/discapacidades/tipo/{tipo}', [DiscapacidadController::class, 'obtenerDiscapacidadesPorTipo']);



    // CAPACITACIONES HAS EMPLEADOS routes
    Route::get('/discapacidades-empleados', [EmpleadoHasDiscapacidadController::class, 'listarDiscapacidadesDeEmpleados']);
    Route::post('/discapacidades-empleados', [EmpleadoHasDiscapacidadController::class, 'crearAsignacionCapacitacion']);
    Route::put('/discapacidades-empleados', [EmpleadoHasDiscapacidadController::class, 'actualizarAsignacionDiscapacidad']);
    Route::delete('/discapacidades-empleados', [EmpleadoHasDiscapacidadController::class, 'eliminarAsignacionCapacitacion']);


    // EMPLEADOS routes
    Route::get('/empleados', [EmpleadoController::class, 'listarEmpleados']);
    Route::get('/empleados/{id}', [EmpleadoController::class, 'mostrarEmpleado']);
    Route::post('/empleados', [EmpleadoController::class, 'crearEmpleado']);
    Route::put('/empleados/{id}', [EmpleadoController::class, 'actualizarEmpleado']);
    Route::delete('/empleados/{id}', [EmpleadoController::class, 'eliminarEmpleado']);
    Route::get('/empleados/departamento/{idDepartamento}', [EmpleadoController::class, 'obtenerEmpleadosPorDepartamento']);
    Route::get('/empleados/estado/{idEstado}', [EmpleadoController::class, 'obtenerEmpleadosPorEstado']);
    Route::get('/empleados/nacionalidad/{nacionalidad}', [EmpleadoController::class, 'obtenerEmpleadosPorNacionalidad']);
    Route::get('/empleados/genero/{genero}', [EmpleadoController::class, 'obtenerEmpleadosPorGenero']);


    // ESTADOS routes
    Route::get('/estados', [EstadoController::class, 'listarEstados']);
    Route::get('/estados/{id}', [EstadoController::class, 'mostrarEstado']); 
    Route::post('/estados', [EstadoController::class, 'crearEstado']);
    Route::put('/estados/{id}', [EstadoController::class, 'actualizarEstado']);
    Route::delete('/estados/{id}', [EstadoController::class, 'eliminarEstado']);


    // EVALUACIONES DESEMPEÑO routes
    Route::get('/evaluacionesDesempeno', [EvaluacionDesempenoController::class, 'listarEvaluacionesDesempeno']);
    Route::get('/evaluacionesDesempeno/{id}', [EvaluacionDesempenoController::class, 'mostrarEvaluacionDesempeno']);
    Route::post('/evaluacionesDesempeno', [EvaluacionDesempenoController::class, 'crearEvaluacionDesempeno']);
    Route::put('/evaluacionesDesempeno/{id}', [EvaluacionDesempenoController::class, 'actualizarEvaluacionDesempeno']);
    Route::delete('/evaluacionesDesempeno/{id}', [EvaluacionDesempenoController::class, 'eliminarEvaluacionDesempeno']);
    Route::get('/evaluacionesDesempeno/porEmpleado/{idEmpleado}', [EvaluacionDesempenoController::class, 'obtenerEvaluacionesPorEmpleado']);
    Route::get('/evaluacionesDesempeno/porEvaluador/{idEvaluador}', [EvaluacionDesempenoController::class, 'obtenerEvaluacionesPorEvaluador']);
    Route::get('/evaluacionesDesempeno/porFecha/{fechaInicio}/{fechaFin}', [EvaluacionDesempenoController::class, 'obtenerEvaluacionesPorFecha']);
    Route::get('/evaluacionesDesempeno/porCalificacionMinima/{calificacionMinima}', [EvaluacionDesempenoController::class, 'obtenerEvaluacionesPorCalificacion']);
    Route::get('/evaluacionesDesempeno/contarPorEmpleado/{idEmpleado}', [EvaluacionDesempenoController::class, 'contarEvaluacionesPorEmpleado']);
    Route::get('/evaluacionesDesempeno/promedioCalificacionPorEvaluador/{idEvaluador}', [EvaluacionDesempenoController::class, 'calcularPromedioCalificacionPorEvaluador']);
    Route::get('/evaluacionesDesempeno/porEstado/{estado}', [EvaluacionDesempenoController::class, 'listasEvaluacionesPorEstado']);


    // EXPERIENCIAS LABORALES routes
    Route::get('/experienciasLaborales', [ExperienciaLaboralController::class, 'listarExperienciasLaborales']);
    Route::get('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'mostrarExperienciasLaborales']);
    Route::post('/experienciasLaborales', [ExperienciaLaboralController::class, 'crearExperienciaLaboral']);
    Route::put('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'actualizarExperienciaLaboral']);
    Route::delete('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'eliminarExperienciaLaboral']);

    Route::get('/experienciasLaborales/empleado/{idEmpleado}', [ExperienciaLaboralController::class, 'experienciasLaboralesEmpleado']);
    Route::get('/experienciasLaborales/instituciones/empleado/{idEmpleado}', [ExperienciaLaboralController::class, 'institucionesUnicasEmpleado']);
    Route::get('/experienciasLaborales/duracion/empleado/{idEmpleado}', [ExperienciaLaboralController::class, 'duracionExperienciaLaboralEmpleado']);
    Route::get('/experienciasLaborales/palabrasClave', [ExperienciaLaboralController::class, 'experienciasPorPalabrasClave']);
    Route::get('/experienciasLaborales/instituciones/instituciones-num-empleados', [ExperienciaLaboralController::class, 'institucionesYNumEmpleados']);
    Route::get('/experienciasLaborales/duracion-mayor/{numMeses}', [ExperienciaLaboralController::class, 'experienciasDuracionMayor']);
    Route::get('/empleados-con-experiencia', [ExperienciaLaboralController::class, 'empleadosConExperiencia']);


    // INSTRUCCIONES FORMALES routes
    Route::get('/instruccionesFormales', [InstruccionFormalController::class, 'listarInstruccionesFormales']);
    Route::get('/instruccionesFormales/{id}', [InstruccionFormalController::class, 'mostrarInstruccionFormal']);
    Route::post('/instruccionesFormales', [InstruccionFormalController::class, 'crearInstruccionFormal']);
    Route::put('/instruccionesFormales/{id}', [InstruccionFormalController::class, 'actualizarInstruccionFormal']);
    Route::delete('/instruccionesFormales/{id}', [InstruccionFormalController::class, 'eliminarInstruccionFormal']);

    // PERMISOS routes
    Route::get('/permisos', [PermisoController::class, 'listarPermisos']);
    Route::get('/permisos/{id}', [PermisoController::class, 'mostrarPermiso']);
    Route::post('/permisos', [PermisoController::class, 'crearPermiso']);
    Route::put('/permisos/{id}', [PermisoController::class, 'actualizarPermiso']);
    Route::delete('/permisos/{id}', [PermisoController::class, 'eliminarPermiso']);


    // REFERENCIAS LABORALES routes
    Route::get('/referenciasLaborales', [ReferenciaLaboralController::class, 'listarReferenciasLaborales']);
    Route::get('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'mostrarReferenciaLaboral']);
    Route::post('/referenciasLaborales', [ReferenciaLaboralController::class, 'crearReferenciaLaboral']);
    Route::put('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'actualizarReferenciaLaboral']);
    Route::delete('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'eliminarReferenciaLaboral']);

    // RESIDENCIAS routes
    Route::get('/residencias', [ResidenciaController::class, 'listarResidencias']);
    Route::get('/residencias/{id}', [ResidenciaController::class, 'mostrarResidencia']);
    Route::post('/residencias', [ResidenciaController::class, 'crearResidencia']);
    Route::put('/residencias/{id}', [ResidenciaController::class, 'actualizarResidencia']);
    Route::delete('/residencias/{id}', [ResidenciaController::class, 'eliminarResidencia']);

    // ROLES routes
    Route::get('/roles', [RolController::class, 'listarRoles']);
    Route::get('/roles/{id}', [RolController::class, 'mostrarRol']);
    Route::post('/roles', [RolController::class, 'crearRol']);
    Route::put('/roles/{id}', [RolController::class, 'actualizarRol']);
    Route::delete('/roles/{id}', [RolController::class, 'eliminarRol']);

    // SALIDAS CAMPO routes
    Route::get('/salidasCampo', [SalidaCampoController::class, 'listarSalidasCampo']);
    Route::get('/salidasCampo/{id}', [SalidaCampoController::class, 'mostrarSalidaCampo']);
    Route::post('/salidasCampo', [SalidaCampoController::class, 'crearSalidaCampo']);
    Route::put('/salidasCampo/{id}', [SalidaCampoController::class, 'actualizarSalidaCampo']);
    Route::delete('/salidasCampo/{id}', [SalidaCampoController::class, 'eliminarSalidaCampo']);

    // TIPOS CONTRATOS routes
    Route::get('/tiposContratos', [TipoContratoController::class, 'listarTiposContrato']);
    Route::get('/tiposContratos/{id}', [TipoContratoController::class, 'mostrarTipoContrato']);
    Route::post('/tiposContratos', [TipoContratoController::class, 'crearTipoContrato']);
    Route::put('/tiposContratos/{id}', [TipoContratoController::class, 'actualizarTipoContrato']);
    Route::delete('/tiposContratos/{id}', [TipoContratoController::class, 'eliminarTipoContrato']);

    // TIPOS SALIDA routes
    Route::get('/tiposSalida', [TipoSalidaController::class, 'listarTiposSalida']);
    Route::get('/tiposSalida/{id}', [TipoSalidaController::class, 'mostrarTipoSalida']);
    Route::post('/tiposSalida', [TipoSalidaController::class, 'crearTipoSalida']);
    Route::put('/tiposSalida/{id}', [TipoSalidaController::class, 'actualizarTipoSalida']);
    Route::delete('/tiposSalida/{id}', [TipoSalidaController::class, 'eliminarTipoSalida']);

    // TIPOS PERMISO routes
    Route::get('/tiposPermiso', [TipoPermisoController::class, 'listarTiposPermiso']);
    Route::get('/tiposPermiso/{id}', [TipoPermisoController::class, 'mostrarTipoPermiso']);
    Route::post('/tiposPermiso', [TipoPermisoController::class, 'crearTipoPermiso']);
    Route::put('/tiposPermiso/{id}', [TipoPermisoController::class, 'actualizarTipoPermiso']);
    Route::delete('/tiposPermiso/{id}', [TipoPermisoController::class, 'eliminarTipoPermiso']);

    // UNIDADES routes
    Route::get('/unidades', [UnidadController::class, 'listarUnidades']);
    Route::get('/unidades/{id}', [UnidadController::class, 'mostrarUnidad']);
    Route::post('/unidades', [UnidadController::class, 'crearUnidad']);
    Route::put('/unidades/{id}', [UnidadController::class, 'actualizarUnidad']);
    Route::delete('/unidades/{id}', [UnidadController::class, 'eliminarUnidad']);

    // USUARIOS routes
    Route::get('/users', [UserController::class, 'listarUsuarios']);
    Route::get('/users/{id}', [UserController::class, 'mostrarUsuario']);
    Route::post('/users', [UserController::class, 'crearUsuario']);
    Route::put('/users/{id}', [UserController::class, 'actualizarUsuario']);
    Route::delete('/users/{id}', [UserController::class, 'eliminarUsuario']);
});
