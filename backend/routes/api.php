<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/preguntasrespuestas', [PreguntaRespuestaCuestionarioController::class, 'index']);
Route::get('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'show']);
Route::post('/preguntasrespuestas', [PreguntaRespuestaCuestionarioController::class, 'store']);
Route::put('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'update']);
Route::delete('/preguntasrespuestas/{id}', [PreguntaRespuestaCuestionarioController::class, 'destroy']);


// REFERENCIAS LABORALES routes
Route::get('/referenciasLaborales', [ReferenciaLaboralController::class, 'index']);
Route::get('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'show']);
Route::post('/referenciasLaborales', [ReferenciaLaboralController::class, 'store']);
Route::put('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'update']);
Route::delete('/referenciasLaborales/{id}', [ReferenciaLaboralController::class, 'destroy']);



// RESIDENCIAS routes
Route::get('/residencias', [ResidenciaController::class, 'index']);
Route::get('/residencias/{id}', [ResidenciaController::class, 'show']);
Route::post('/residencias', [ResidenciaController::class, 'store']);
Route::put('/residencias/{id}', [ResidenciaController::class, 'update']);
Route::delete('/residencias/{id}', [ResidenciaController::class, 'destroy']);


// ROLES routes
Route::get('/roles', [RolController::class, 'index']);
Route::get('/roles/{id}', [RolController::class, 'show']);
Route::post('/roles', [RolController::class, 'store']);
Route::put('/roles/{id}', [RolController::class, 'update']);
Route::delete('/roles/{id}', [RolController::class, 'destroy']);



// SALIDAS CAMPO routes
Route::get('/salidasCampo', [SalidaCampoController::class, 'index']);
Route::get('/salidasCampo/{id}', [SalidaCampoController::class, 'show']);
Route::post('/salidasCampo', [SalidaCampoController::class, 'store']);
Route::put('/salidasCampo/{id}', [SalidaCampoController::class, 'update']);
Route::delete('/salidasCampo/{id}', [SalidaCampoController::class, 'destroy']);


// TIPO SCONTRATOS routes
Route::get('/tiposContratos', [TipoContratoController::class, 'index']);
Route::get('/tiposContratos/{id}', [TipoContratoController::class, 'show']);
Route::post('/tiposContratos', [TipoContratoController::class, 'store']);
Route::put('/tiposContratos/{id}', [TipoContratoController::class, 'update']);
Route::delete('/tiposContratos/{id}', [TipoContratoController::class, 'destroy']);


// TIPOS Salida routes
Route::get('/tiposSalida', [TipoSalidaController::class, 'index']);
Route::get('/tiposSalida/{id}', [TipoSalidaController::class, 'show']);
Route::post('/tiposSalida', [TipoSalidaController::class, 'store']);
Route::put('/tiposSalida/{id}', [TipoSalidaController::class, 'update']);
Route::delete('/tiposSalida/{id}', [TipoSalidaController::class, 'destroy']);


// TIPOS PERMISO routes
Route::get('/tiposPermiso', [TipoPermisoController::class, 'index']);
Route::get('/tiposPermiso/{id}', [TipoPermisoController::class, 'show']);
Route::post('/tiposPermiso', [TipoPermisoController::class, 'store']);
Route::put('/tiposPermiso/{id}', [TipoPermisoController::class, 'update']);
Route::delete('/tiposPermiso/{id}', [TipoPermisoController::class, 'destroy']);



// UNIDADES routes
Route::get('/unidades', [UnidadController::class, 'index']);
Route::get('/unidades/{id}', [UnidadController::class, 'show']);
Route::post('/unidades', [UnidadController::class, 'store']);
Route::put('/unidades/{id}', [UnidadController::class, 'update']);
Route::delete('/unidades/{id}', [UnidadController::class, 'destroy']);




// USUARIOS routes
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);
