<?php

use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ControlDiarioController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\DatoBancarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DiscapasidadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EvaluacionDesempenoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\InstrucionFormalController;
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
use App\Models\SalidaCampo;
use App\Models\TipoSalida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// CAPASITACIONES routes
Route::get('/capacitaciones', [CapacitacionController::class, 'index']);
Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'show']);
Route::post('/capacitaciones', [CapacitacionController::class, 'store']);
Route::put('/capacitaciones/{id}', [CapacitacionController::class, 'update']);
Route::delete('/capacitaciones/{id}', [CapacitacionController::class, 'destroy']);



// CARGOS routes
Route::get('/cargos', [CargoController::class, 'index']);
Route::get('/cargos/{id}', [CargoController::class, 'show']);
Route::post('/cargos', [CargoController::class, 'store']);
Route::put('/cargos/{id}', [CargoController::class, 'update']);
Route::delete('/cargos/{id}', [CargoController::class, 'destroy']);


// CONTRATOS routes
Route::get('/contratos', [ContratoController::class, 'index']);
Route::get('/contratos/{id}', [ContratoController::class, 'show']);
Route::post('/contratos', [ContratoController::class, 'store']);
Route::put('/contratos/{id}', [ContratoController::class, 'update']);
Route::delete('/contratos/{id}', [ContratoController::class, 'destroy']);



// CONTROLDIARIO routes
Route::get('/controlDiario', [ControlDiarioController::class, 'index']);
Route::get('/controlDiario/{id}', [ControlDiarioController::class, 'show']);
Route::post('/controlDiario', [ControlDiarioController::class, 'store']);
Route::put('/controlDiario/{id}', [ControlDiarioController::class, 'update']);
Route::delete('/controlDiario/{id}', [ControlDiarioController::class, 'destroy']);



// CUESTIONARIO routes
Route::get('/cuestionarios', [CuestionarioController::class, 'index']);
Route::get('/cuestionarios/{id}', [CuestionarioController::class, 'show']);
Route::post('/cuestionarios', [CuestionarioController::class, 'store']);
Route::put('/cuestionarios/{id}', [CuestionarioController::class, 'update']);
Route::delete('/cuestionarios/{id}', [CuestionarioController::class, 'destroy']);



// DEPARTAMENTOS routes
Route::get('/datosBancarios', [DatoBancarioController::class, 'index']);
Route::get('/datosBancarios/{id}', [DatoBancarioController::class, 'show']);
Route::post('/datosBancarios', [DatoBancarioController::class, 'store']);
Route::put('/datosBancarios/{id}', [DatoBancarioController::class, 'update']);
Route::delete('/datosBancarios/{id}', [DatoBancarioController::class, 'destroy']);


// DEPARTAMENTOS routes
Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/departamentos/{id}', [DepartamentoController::class, 'show']);
Route::post('/departamentos', [DepartamentoController::class, 'store']);
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update']);
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy']);



// DISCAPASIDADES routes
Route::get('/discapasidades', [DiscapasidadController::class, 'index']);
Route::get('/discapasidades/{id}', [DiscapasidadController::class, 'show']);
Route::post('/discapasidades', [DiscapasidadController::class, 'store']);
Route::put('/discapasidades/{id}', [DiscapasidadController::class, 'update']);
Route::delete('/discapasidades/{id}', [DiscapasidadController::class, 'destroy']);



// EMPLEADOS routes
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);



// ESTADOS routes
Route::get('/estados', [EstadoController::class, 'index']);
Route::get('/estados/{id}', [EstadoController::class, 'show']);
Route::post('/estados', [EstadoController::class, 'store']);
Route::put('/estados/{id}', [EstadoController::class, 'update']);
Route::delete('/estados/{id}', [EstadoController::class, 'destroy']);


// EVALUACION DESEMPENO routes
Route::get('/evaluacionsDesempeno', [EvaluacionDesempenoController::class, 'index']);
Route::get('/evaluacionsDesempeno/{id}', [EvaluacionDesempenoController::class, 'show']);
Route::post('/evaluacionsDesempeno', [EvaluacionDesempenoController::class, 'store']);
Route::put('/evaluacionsDesempeno/{id}', [EvaluacionDesempenoController::class, 'update']);
Route::delete('/evaluacionsDesempeno/{id}', [EvaluacionDesempenoController::class, 'destroy']);


// EXPERIENCIAS LABORALES routes
Route::get('/experienciasLaborales', [ExperienciaLaboralController::class, 'index']);
Route::get('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'show']);
Route::post('/experienciasLaborales', [ExperienciaLaboralController::class, 'store']);
Route::put('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'update']);
Route::delete('/experienciasLaborales/{id}', [ExperienciaLaboralController::class, 'destroy']);



// INSTRUCCION FORMAL routes
Route::get('/instrucionesFormales', [InstrucionFormalController::class, 'index']);
Route::get('/instrucionesFormales/{id}', [InstrucionFormalController::class, 'show']);
Route::post('/instrucionesFormales', [InstrucionFormalController::class, 'store']);
Route::put('/instrucionesFormales/{id}', [InstrucionFormalController::class, 'update']);
Route::delete('/instrucionesFormales/{id}', [InstrucionFormalController::class, 'destroy']);


// PERMISOS routes
Route::get('/permisos', [PermisoController::class, 'index']);
Route::get('/permisos/{id}', [PermisoController::class, 'show']);
Route::post('/permisos', [PermisoController::class, 'store']);
Route::put('/permisos/{id}', [PermisoController::class, 'update']);
Route::delete('/permisos/{id}', [PermisoController::class, 'destroy']);



// PREGUNTAS Y RESPUESTAS routes
Route::get('/preguntasrespuestas', [PreguntaRespuestaCuestionarioController::class, 'listarPreguntasRespuestasCuestionarios']);
Route::get('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'mostrarPreguntaRespuestaCuestionario']);
Route::post('/preguntasrespuestas', [PreguntaRespuestaCuestionarioController::class, 'crearPreguntaRespuestaCuestionario']);
Route::put('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'actualizarPreguntaRespuestaCuestionario']);
Route::delete('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'eliminarPreguntaRespuestaCuestionario']);



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
