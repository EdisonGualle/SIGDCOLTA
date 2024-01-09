<?php

use App\Http\Controllers\CantonesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Auth

use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DatoBancarioController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EvaluacionDesempenoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\InstruccionFormalController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\ReferenciaLaboralController;
use App\Http\Controllers\RegistroAsistenciaController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SalidaCampoController;
use App\Http\Controllers\TipoAsistenciaController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\TipoPermisoController;
use App\Http\Controllers\TipoSalidaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstadoPermisoController;
use App\Http\Controllers\JerarquiaPermisoController;
use App\Http\Controllers\AprobacionPermisoController;
use App\Http\Controllers\Admin\AdministrarPermisosController;



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

Route::post('/usuarios', [UsuarioController::class, 'crearUsuario']);

// CAPACITACIONES routes

Route::get('/capacitaciones', [CapacitacionController::class, 'listarCapacitaciones']);
Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'listarCapacitacionPorId']);
Route::get('/capacitaciones/nombre/{nombre}', [CapacitacionController::class, 'listarCapacitacionPorNombre']);
Route::get('/capacitaciones/fecha/{fecha}', [CapacitacionController::class, 'listarCapacitacionesPorFecha']);
Route::get('/capacitaciones/rango-fechas/{fechaInicio}/{fechaFin}', [CapacitacionController::class, 'listarCapacitacionesPorRangoDeFechas']);
Route::post('/capacitaciones', [CapacitacionController::class, 'crearCapacitacion']);
Route::put('/capacitaciones/{id}', [CapacitacionController::class, 'actualizarCapacitacion']);
Route::delete('/capacitaciones/{id}', [CapacitacionController::class, 'eliminarCapacitacion']);

Route::post('/capacitaciones/asignacion-empleado-capacitacion', [CapacitacionController::class, 'crearAsignacionEmpleadoCapacitacion']);
Route::put('/capacitaciones/asignacion-empleado-capacitacion/{idEmpleado}/{idCapacitacion}', [CapacitacionController::class, 'actualizarAsignacionEmpleadoCapacitacion']);
Route::delete('/capacitaciones/asignacion-empleado-capacitacion/{idEmpleado}/{idCapacitacion}', [CapacitacionController::class, 'eliminarAsignacionEmpleadoCapacitacion']);
Route::get('/capacitaciones/capacitaciones-por-empleado/id/{idEmpleado}', [CapacitacionController::class, 'listarCapacitacionesPorEmpleadoId']);
Route::get('/capacitaciones/capacitaciones-no-realizadas-por-empleado/id/{idEmpleado}', [CapacitacionController::class, 'listarCapacitacionesNoRealizadasPorEmpleadoId']);
Route::get('/capacitaciones/empleados-por-capacitacion/id/{idCapacitacion}', [CapacitacionController::class, 'listarEmpleadosPorCapacitacionId']);



// CARGOS routes
// Route::get('/cargos', [CargoController::class, 'listarCargos']);
// Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']);
// Route::post('/cargos', [CargoController::class, 'crearCargo']);
// Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']);
// Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']);


Route::controller(CargoController::class)->group(function () {
    Route::get('/cargos', 'listarCargos');
    Route::get('/cargos/{id}', 'mostrarCargo');
    Route::post('/cargos',  'crearCargo');
    Route::put('/cargos/{id}', 'actualizarCargo');
    Route::delete('/cargos/{id}', 'eliminarCargo');
});

// JerarquiaPermiso routes
Route::controller(JerarquiaPermisoController::class)->group(function () {
    Route::get('/jerarquia-permiso', 'listarJerarquiasPermiso');
    Route::get('/jerarquia-permiso/{idCargo}/{idCargoAprobador}', 'mostrarJerarquiaPermiso');
    Route::post('/jerarquia-permiso', 'crearJerarquiaPermiso');
    Route::put('/jerarquia-permiso/{idCargo}/{idCargoAprobador}', 'actualizarJerarquiaPermiso');
    Route::delete('/jerarquia-permiso/{idCargo}/{idCargoAprobador}', 'eliminarJerarquiaPermiso');
});

// Rutas para AprobacionPermiso
Route::controller(AprobacionPermisoController::class)->group(function () {
    Route::get('/aprobaciones-permiso','listarAprobacionesPermiso');
    Route::get('/aprobaciones-permiso/{id}', 'mostrarAprobacionPermiso');
    Route::post('/aprobaciones-permiso', 'crearAprobacionPermiso');
    Route::put('/aprobaciones-permiso/{id}','actualizarAprobacionPermiso');
    Route::delete('/aprobaciones-permiso/{id}', 'eliminarAprobacionPermiso');    
});



// CONTRATOS routes
Route::get('/contratos', [ContratoController::class, 'listarContratos']);
Route::get('/contratos/{id}', [ContratoController::class, 'mostrarContrato']);
Route::get('/contratos/empleado/cedula/{cedula}', [ContratoController::class, 'listarContratosPorCedula']);
Route::get('/contratos/estado/{estadoContrato}', [ContratoController::class, 'listarContratosPorEstado']);
Route::get('/contratos/empleado/id/{idEmpleado}', [ContratoController::class, 'listarContratosPorIdEmpleado']);
Route::get('/contratos/tipo/id/{idTipoContrato}', [ContratoController::class, 'listarContratosPorIdTipoContrato']);
Route::get('/contratos/tipo/nombre/{nombreTipoContrato}', [ContratoController::class, 'listarContratosPorNombreTipoContrato']);
Route::post('/contratos', [ContratoController::class, 'crearContrato']);
Route::put('/contratos/{id}', [ContratoController::class, 'actualizarContrato']);
Route::delete('/contratos/{id}', [ContratoController::class, 'eliminarContrato']);


// DATOS BANCARIOS routes
Route::get('/datos-bancarios', [DatoBancarioController::class, 'listarDatosBancarios']);
Route::get('/datos-bancarios/{id}', [DatoBancarioController::class, 'mostrarDatoBancarioPorId']);
Route::get('/datos-bancarios/empleado/id/{idEmpleado}', [DatoBancarioController::class, 'listarDatosBancariosPorIdEmpleado']);
Route::get('/datos-bancarios/empleado/cedula/{cedulaEmpleado}', [DatoBancarioController::class, 'listarDatosBancariosPorCedulaEmpleado']);
Route::get('/datos-bancarios/banco/{nombreBanco}', [DatoBancarioController::class, 'listarDatosBancariosPorNombreBanco']);
Route::get('/datos-bancarios/tipo-cuenta/{tipoCuenta}', [DatoBancarioController::class, 'listarDatosBancariosPorTipoCuenta']);
Route::post('/datos-bancarios', [DatoBancarioController::class, 'crearDatoBancario']);
Route::put('/datos-bancarios/{id}', [DatoBancarioController::class, 'actualizarDatoBancario']);
Route::delete('/datos-bancarios/{id}', [DatoBancarioController::class, 'eliminarDatoBancario']);


Route::get('/direcciones', [DireccionController::class, 'listarDirecciones']);
Route::get('/direcciones/{id}', [DireccionController::class, 'mostrarDireccionPorId']);
Route::post('/direcciones', [DireccionController::class, 'crearDireccion']);
Route::put('/direcciones/{id}', [DireccionController::class, 'actualizarDireccion']);
Route::delete('/direcciones/{id}', [DireccionController::class, 'eliminarDireccion']);

// DISCAPACIDADES routes
Route::get('/discapacidades', [DiscapacidadController::class, 'listarDiscapacidades']);
Route::get('/discapacidades/{id}', [DiscapacidadController::class, 'mostrarDiscapacidad']);
Route::get('/discapacidades/tipo/{tipo}', [DiscapacidadController::class, 'listarDiscapacidadesPorTipo']);
Route::post('/discapacidades', [DiscapacidadController::class, 'crearDiscapacidad']);
Route::put('/discapacidades/{id}', [DiscapacidadController::class, 'actualizarDiscapacidad']);
Route::delete('/discapacidades/{id}', [DiscapacidadController::class, 'eliminarDiscapacidad']);

Route::post('/discapacidades/asignacion-empleado-discapacidad', [DiscapacidadController::class, 'crearAsignacionEmpleadoDiscapacidad']);
Route::put('/discapacidades/asignacion-empleado-discapacidad/{idEmpleado}/{idDiscapacidad}', [DiscapacidadController::class, 'actualizarAsignacionEmpleadoDiscapacidad']);
Route::delete('/discapacidades/asignacion-empleado-discapacidad/{idEmpleado}/{idDiscapacidad}', [DiscapacidadController::class, 'eliminarAsignacionEmpleadoDiscapacidad']);
Route::get('/discapacidades/discapacidades-por-empleado/id/{idEmpleado}', [DiscapacidadController::class, 'listarDiscapacidadesPorEmpleadoId']);
Route::get('/discapacidades/empleados-por-discapacidad/id/{idDiscapacidad}', [DiscapacidadController::class, 'listarEmpleadosPorDiscapacidadId']);


// EMPLEADOS routes
Route::get('/empleados', [EmpleadoController::class, 'listarEmpleados']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'mostrarEmpleadoPorId']);
/////
Route::get('/empleados/direccion/{idDireccion}', [EmpleadoController::class, 'listarEmpleadosPorDireccionId']);
/////
Route::get('/empleados/unidad/{idUnidad}', [EmpleadoController::class, 'listarEmpleadosPorUnidadId']);
Route::get('/empleados/cargo/{idCargo}', [EmpleadoController::class, 'listarEmpleadosPorCargoId']);
Route::get('/empleados/estado/{idEstado}', [EmpleadoController::class, 'listarEmpleadosPorEstadoId']);//*Creado*/
Route::get('/empleados/genero/{genero}', [EmpleadoController::class, 'listarEmpleadosPorGenero']);
Route::get('/empleados/nacionalidad/{nacionalidad}', [EmpleadoController::class, 'listarEmpleadosPorNacionalidad']);
Route::get('/empleados/provincia/{id_provincia}', [EmpleadoController::class, 'listarEmpleadosPorProvincia']);
Route::get('/empleados/canton/{id_canton}', [EmpleadoController::class, 'listarEmpleadosPorCanton']);
Route::post('/empleados', [EmpleadoController::class, 'crearEmpleado']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'actualizarEmpleado']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'eliminarEmpleado']);

// PROVINCIAS routes
Route::get('/provincia', [ProvinciaController::class, 'listarProvincia']);
Route::get('/provincia/{id}', [ProvinciaController::class, 'mostrarProvincia']);
// PROVINCIAS routes
Route::get('/cantones', [CantonesController::class, 'listarCantones']);
Route::get('/cantones/{id}', [CantonesController::class, 'mostrarCantones']);



// ESTADOS routes
Route::get('/estados', [EstadoController::class, 'listarEstados']);
Route::get('/estados/{id}', [EstadoController::class, 'mostrarEstado']);
Route::post('/estados', [EstadoController::class, 'crearEstado']);
Route::put('/estados/{id}', [EstadoController::class, 'actualizarEstado']);
Route::delete('/estados/{id}', [EstadoController::class, 'eliminarEstado']);


// EVALUACIONES DESEMPEÑO routes
Route::get('/evaluaciones-desempeno', [EvaluacionDesempenoController::class, 'listarEvaluacionesDesempeno']);
Route::get('/evaluaciones-desempeno/{id}', [EvaluacionDesempenoController::class, 'mostrarEvaluacionDesempenoPorId']);
Route::post('/evaluaciones-desempeno', [EvaluacionDesempenoController::class, 'crearEvaluacionDesempeno']);
Route::put('/evaluaciones-desempeno/{id}', [EvaluacionDesempenoController::class, 'actualizarEvaluacionDesempeno']);
Route::delete('/evaluaciones-desempeno/{id}', [EvaluacionDesempenoController::class, 'eliminarEvaluacionDesempeno']);
Route::get('/evaluaciones-desempeno/empleado/id/{idEmpleado}', [EvaluacionDesempenoController::class, 'listarEvaluacionesPorEmpleadoId']);
Route::get('/evaluaciones-desempeno/evaluador/id/{idEvaluador}', [EvaluacionDesempenoController::class, 'listarEvaluacionesPorEvaluadorId']);
Route::get('/evaluaciones-desempeno/empleado/cedula/{cedulaEmpleado}', [EvaluacionDesempenoController::class, 'listarEvaluacionesPorCedulaEmpleado']);
Route::get('/evaluaciones-desempeno/evaluador/cedula/{cedulaEvaluador}', [EvaluacionDesempenoController::class, 'listarEvaluacionesPorCedulaEvaluador']);
Route::get('/evaluaciones-desempeno/porFechas/{fechaInicio}/{fechaFin}', [EvaluacionDesempenoController::class, 'listarEvaluacionesPorRangoFechas']);
Route::get('/evaluaciones-desempeno/porEstado/{estado}', [EvaluacionDesempenoController::class, 'listasEvaluacionesPorEstado']);


// EXPERIENCIAS LABORALES routes
Route::get('/experienciasLaborales', [ExperienciaLaboralController::class, 'listarExperienciasLaborales']);
Route::get('/experienciaLaboralId/{id}', [ExperienciaLaboralController::class, 'mostrarExperienciaLaboralId']);
Route::post('/experienciasLaborales', [ExperienciaLaboralController::class, 'crearExperienciaLaboral']);
Route::put('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'actualizarExperienciaLaboral']);
Route::delete('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'eliminarExperienciaLaboral']);
Route::get('/experienciasLaborales/empleado/id/{idEmpleado}', [ExperienciaLaboralController::class, 'experienciasLaboralesEmpleadoId']);
Route::get('/experienciasLaborales/empleado/cedula/{cedulaEmpleado}', [ExperienciaLaboralController::class, 'experienciasLaboralesPorCedulaEmpleado']);


// INSTRUCCIONES FORMALES routes
Route::get('/instrucciones-formales', [InstruccionFormalController::class, 'listarInstruccionesFormales']);
Route::get('/instrucciones-formalesPorId/{id}', [InstruccionFormalController::class, 'mostrarInstruccionFormalPorId']);
Route::post('/instrucciones-formales', [InstruccionFormalController::class, 'crearInstruccionFormal']);
Route::put('/instrucciones-formales/{id}', [InstruccionFormalController::class, 'actualizarInstruccionFormal']);
Route::delete('/instrucciones-formales/{id}', [InstruccionFormalController::class, 'eliminarInstruccionFormal']);


// PERMISOS routes
// Route::get('/permisos', [PermisoController::class, 'listarPermisos']);
// Route::get('/permiso/{id}', [PermisoController::class, 'mostrarPermisoId']);
// Route::post('/permisos', [PermisoController::class, 'crearPermiso']);
// Route::put('/permisos/{id}', [PermisoController::class, 'actualizarPermiso']);
// Route::delete('/permisos/{id}', [PermisoController::class, 'eliminarPermiso']);

Route::controller(PermisoController::class)->group(function () {
    Route::get('/permisos','listarPermisos');
    Route::get('/permisos/{id}','mostrarPermisoId');
    Route::post('/permisos','crearPermiso');
    Route::put('/permisos/{id}', 'actualizarPermiso');
    Route::delete('/permisos/{id}', 'eliminarPermiso');
});


Route::get('/referencias-laborales', [ReferenciaLaboralController::class, 'listarReferenciasLaborales']);
Route::get('/referencias-laborales/{id}', [ReferenciaLaboralController::class, 'mostrarReferenciaLaboralPorId']);
Route::post('/referencias-laborales', [ReferenciaLaboralController::class, 'crearReferenciaLaboral']);
Route::put('/referencias-laborales/{id}', [ReferenciaLaboralController::class, 'actualizarReferenciaLaboral']);
Route::delete('/referencias-laborales/{id}', [ReferenciaLaboralController::class, 'eliminarReferenciaLaboral']);


// REGISTRO ASISTENCIA routes
Route::get('/registros-asistencia', [RegistroAsistenciaController::class, 'listarRegistrosAsistencia']);
Route::get('/registros-asistencia/{id}', [RegistroAsistenciaController::class, 'mostrarRegistroAsistenciaPorId']);
Route::post('/registros-asistencia', [RegistroAsistenciaController::class, 'registrarAsistencia']);
Route::put('/registros-asistencia/{id}', [RegistroAsistenciaController::class, 'actualizarAsistencia']);
Route::delete('/registros-asistencia/{id}', [RegistroAsistenciaController::class, 'eliminarRegistroAsistencia']);
Route::get('/registros-asistencia/empleado/cedula/{cedula}', [RegistroAsistenciaController::class, 'listarAsistenciaPorCedulaEmpleado']);
Route::get('/registros-asistencia/empleado/id/{id}', [RegistroAsistenciaController::class, 'listarAsistenciaPorIdEmpleado']);
Route::get('/registros-asistencia/tipo/{tipo}', [RegistroAsistenciaController::class, 'listarAsistenciaPorTipoAsistencia']);
Route::get('/registros-asistencia/estado/{estado}', [RegistroAsistenciaController::class, 'listarAsistenciaPorEstadoAsistencia']);


// RESIDENCIAS routes
Route::get('/residencias', [ResidenciaController::class, 'listarResidencias']);
Route::get('/residencias/{id}', [ResidenciaController::class, 'mostrarResidenciaPorId']);
Route::post('/residencias', [ResidenciaController::class, 'crearResidencia']);
Route::put('/residencias/{id}', [ResidenciaController::class, 'actualizarResidencia']);
Route::delete('/residencias/{id}', [ResidenciaController::class, 'eliminarResidencia']);


// ROLES routes
Route::get('/roles', [RolController::class, 'listarRoles']);
Route::get('/roles/{id}', [RolController::class, 'mostrarRolPorId']);
Route::post('/roles', [RolController::class, 'crearRol']);
Route::put('/roles/{id}', [RolController::class, 'actualizarRol']);
Route::delete('/roles/{id}', [RolController::class, 'eliminarRol']);

// SALIDAS CAMPO routes
Route::get('/salidas-campo', [SalidaCampoController::class, 'listarSalidasCampo']);
Route::get('/salidas-campo/{id}', [SalidaCampoController::class, 'mostrarSalidaCampoPorId']);
Route::post('/salidas-campo', [SalidaCampoController::class, 'crearSalidaCampo']);
Route::put('/salidas-campo/{id}', [SalidaCampoController::class, 'actualizarSalidaCampo']);
Route::delete('/salidas-campo/{id}', [SalidaCampoController::class, 'eliminarSalidaCampo']);

// TipoAsistencia routes
Route::get('/tipos-asistencia', [TipoAsistenciaController::class, 'listarTiposAsistencia']);
Route::get('/tipos-asistencia/{id}', [TipoAsistenciaController::class, 'mostrarTipoAsistenciaPorId']);
Route::post('/tipos-asistencia', [TipoAsistenciaController::class, 'crearTipoAsistencia']);
Route::put('/tipos-asistencia/{id}', [TipoAsistenciaController::class, 'actualizarTipoAsistencia']);
Route::delete('/tipos-asistencia/{id}', [TipoAsistenciaController::class, 'eliminarTipoAsistencia']);


// TIPOS CONTRATOS routes
Route::get('/tipos-contrato', [TipoContratoController::class, 'listarTiposContrato']);
Route::get('/tipos-contrato/{id}', [TipoContratoController::class, 'mostrarTipoContratoPorId']);
Route::post('/tipos-contrato', [TipoContratoController::class, 'crearTipoContrato']);
Route::put('/tipos-contrato/{id}', [TipoContratoController::class, 'actualizarTipoContrato']);
Route::delete('/tipos-contrato/{id}', [TipoContratoController::class, 'eliminarTipoContrato']);



// TIPOS PERMISO routes
// Route::get('/tiposPermiso', [TipoPermisoController::class, 'listarTiposPermiso']);
// Route::get('/tiposPermiso/{id}', [TipoPermisoController::class, 'mostrarTipoPermisoPorId']);
// Route::post('/tiposPermiso', [TipoPermisoController::class, 'crearTipoPermiso']);
// Route::put('/tiposPermiso/{id}', [TipoPermisoController::class, 'actualizarTipoPermiso']);
// Route::delete('/tiposPermiso/{id}', [TipoPermisoController::class, 'eliminarTipoPermiso']);

Route::controller(TipoPermisoController::class)->group(function () {
    Route::get('/tiposPermiso','listarTiposPermiso');
    Route::get('/tiposPermiso/{id}', 'mostrarTipoPermisoPorId');
    Route::post('/tiposPermiso', 'crearTipoPermiso');
    Route::put('/tiposPermiso/{id}', 'actualizarTipoPermiso');
    Route::delete('/tiposPermiso/{id}', 'eliminarTipoPermiso');
});

// ESTADO PERMISO Routes
Route::controller(EstadoPermisoController::class)->group(function () {
    Route::get('estadoPermiso', 'listarEstadosPermiso');
    Route::get('estadoPermiso/{id}', 'mostrarEstadoPermisoPorId');
    Route::post('estadoPermiso', 'crearEstadoPermiso');
    Route::put('estadoPermiso/{id}',  'actualizarEstadoPermiso');
    Route::delete('estadoPermiso/{id}','eliminarEstadoPermiso');
});


// TIPOS SALIDA routes
Route::get('/tiposSalida', [TipoSalidaController::class, 'listarTiposSalida']);
Route::get('/tiposSalida/{id}', [TipoSalidaController::class, 'mostrarTipoSalidaPorId']);
Route::post('/tiposSalida', [TipoSalidaController::class, 'crearTipoSalida']);
Route::put('/tiposSalida/{id}', [TipoSalidaController::class, 'actualizarTipoSalida']);
Route::delete('/tiposSalida/{id}', [TipoSalidaController::class, 'eliminarTipoSalida']);

// UNIDADES routes
Route::get('/unidades', [UnidadController::class, 'listarUnidades']);
Route::get('/unidades/{id}', [UnidadController::class, 'mostrarUnidadPorId']);
Route::post('/unidades', [UnidadController::class, 'crearUnidad']);
Route::put('/unidades/{id}', [UnidadController::class, 'actualizarUnidad']);
Route::delete('/unidades/{id}', [UnidadController::class, 'eliminarUnidad']);



// USUARIOS routes
Route::get('/usuarios', [UsuarioController::class, 'listarUsuarios']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'mostrarUsuarioPorId']);
Route::post('/usuarios', [UsuarioController::class, 'crearUsuario']);
Route::post('/usuarios/suspender/{id}', [UsuarioController::class, 'suspenderUsuario']);
Route::post('/usuarios/activar/{id}', [UsuarioController::class, 'activarUsuario']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizarUsuario']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminarUsuario']);


// Listar los permisos apobar loguiado
Route::get('/listar-aprobaciones', [AdministrarPermisosController::class, 'listarAprobacionesPermiso']);
Route::get('/aprobaciones-empleado/{idEmpleado}', [AdministrarPermisosController::class, 'listarAprobacionesEmpleadoId']);
Route::get('/permisos-estado/{estadoPermiso}', [AdministrarPermisosController::class, 'listarPermisosPorEstado']);
Route::patch('/aprobacionpermiso/{idAprobacionSolicitud}',[AdministrarPermisosController::class, 'editarAprobacionPermisoId']);




