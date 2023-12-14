<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\AuthController;


use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ControlDiarioController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\DatoBancarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DiscapacidadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EvaluacionDesempenoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\InstruccionFormalController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PreguntaRespuestaCuestionarioController;
use App\Http\Controllers\ReferenciaLaboralController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SalidaCampoController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\TipoPermisoController;
use App\Http\Controllers\TipoSalidaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UsuarioController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas AUTH
Route::post('/registro', [ AuthController::class, 'registro']);
Route::post('/login', [ AuthController::class, 'login']);

// Rutas de prueba ---- Cuando el usuario este loguiado permite ciertas rutas 
Route::middleware('auth:sanctum')->group(function(){
    // CARGOS routes ---- basicas de un administrador
    Route::post('/cargos', [CargoController::class, 'crearCargo']);
    Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']);
    Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']); 
    
    //Cerrar sesion
    Route::post('logout', [AuthController::class, "logout"]); 
});






// CAPACITACIONES routes
Route::get('/capacitaciones', [CapacitacionController::class, 'listarCapacitaciones']);
Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'mostrarCapacitacion']);
Route::post('/capacitaciones', [CapacitacionController::class, 'crearCapacitacion']);
Route::put('/capacitaciones/{id}', [CapacitacionController::class, 'actualizarCapacitacion']);
Route::delete('/capacitaciones/{id}', [CapacitacionController::class, 'eliminarCapacitacion']);

// CARGOS routes
Route::get('/cargos', [CargoController::class, 'listarCargos']);
Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']);
// Route::post('/cargos', [CargoController::class, 'crearCargo']);
// Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']);
// Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']);

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
Route::get('/datos-bancarios', [DatoBancarioController::class, 'listarDatosBancarios']);
Route::get('/datos-bancarios/{id}', [DatoBancarioController::class, 'mostrarDatoBancario']);
Route::post('/datos-bancarios', [DatoBancarioController::class, 'crearDatoBancario']);
Route::put('/datos-bancarios/{id}', [DatoBancarioController::class, 'actualizarDatoBancario']);
Route::delete('/datos-bancarios/{id}', [DatoBancarioController::class, 'eliminarDatoBancario']);

// DEPARTAMENTOS routes
Route::get('/departamentos', [DepartamentoController::class, 'listarDepartamentos']);
Route::get('/departamentos/{id}', [DepartamentoController::class, 'mostrarDepartamento']);
Route::post('/departamentos', [DepartamentoController::class, 'crearDepartamento']);
Route::put('/departamentos/{id}', [DepartamentoController::class, 'actualizarDepartamento']);
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'eliminarDepartamento']);

// DISCAPACIDADES routes
Route::get('/discapacidades', [DiscapacidadController::class, 'listarDiscapacidades']);
Route::get('/discapacidades/{id}', [DiscapacidadController::class, 'mostrarDiscapacidad']);
Route::post('/discapacidades', [DiscapacidadController::class, 'crearDiscapacidad']);
Route::put('/discapacidades/{id}', [DiscapacidadController::class, 'actualizarDiscapacidad']);
Route::delete('/discapacidades/{id}', [DiscapacidadController::class, 'eliminarDiscapacidad']);

// EMPLEADOS routes
Route::get('/empleados', [EmpleadoController::class, 'listarEmpleados']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'mostrarEmpleado']);
Route::post('/empleados', [EmpleadoController::class, 'crearEmpleado']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'actualizarEmpleado']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'eliminarEmpleado']);

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


// EXPERIENCIAS LABORALES routes
Route::get('/experienciasLaborales', [ExperienciaLaboralController::class, 'listarExperienciasLaborales']);
Route::get('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'mostrarExperienciasLaborales']);
Route::post('/experienciasLaborales', [ExperienciaLaboralController::class, 'crearExperienciasLaborales']);
Route::put('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'actualizarExperienciasLaborales']);
Route::delete('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'eliminarExperienciasLaborales']);

// INSTRUCCIONES FORMALES routes
Route::get('/instrucciones-formales', [InstruccionFormalController::class, 'listarInstruccionesFormales']);
Route::get('/instrucciones-formales/{id}', [InstruccionFormalController::class, 'mostrarInstruccionFormal']);
Route::post('/instrucciones-formales', [InstruccionFormalController::class, 'crearInstruccionFormal']);
Route::put('/instrucciones-formales/{id}', [InstruccionFormalController::class, 'actualizarInstruccionFormal']);
Route::delete('/instrucciones-formales/{id}', [InstruccionFormalController::class, 'eliminarInstruccionFormal']);

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
Route::get('/usuarios', [UsuarioController::class, 'listarUsuarios']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'mostrarUsuario']);
Route::post('/usuarios', [UsuarioController::class, 'crearUsuario']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizarUsuario']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminarUsuario']);
