<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmpleadoCapacitacionController;
use App\Http\Controllers\Employee\EmpleadoCargoController;
use App\Http\Controllers\Employee\EmpleadoContratoController;
use App\Http\Controllers\Employee\EmpleadoDepartamentoController;
use App\Http\Controllers\Employee\EmpleadoDatoBancarioController;
use App\Http\Controllers\Employee\EmpleadoEvaluaciondesempenoController;
use App\Http\Controllers\Employee\EmpleadoExperiencialaboralController;
use App\Http\Controllers\Employee\EmpleadoInstruccionformalController;


//Rutas Capacitaciones
Route::get('/mis-capacitaciones', [EmpleadoCapacitacionController::class, 'listarCapacitacionesPorEmpleadoAuth']);
Route::get('/mis-capacitaciones/total', [EmpleadoCapacitacionController::class, 'obtenerTotalCapacitacionesPorEmpleadoAuth']);

//Rutas Cargo
Route::get('/mi-cargo', [EmpleadoCargoController::class, 'mostrarInformacionEmpleadoCargoDepartamento']);

//Rutas Contrato
Route::get('/mis-contratos', [EmpleadoContratoController::class, 'listarContratosPorEmpleadoAuth']);

//Rutas Departamento
Route::get('/mis-departamentos', [EmpleadoDepartamentoController::class, 'obtenerDatosEmpleadoAuth']);

//Rutas Dato Bancario
Route::get('/mostrar-datos-bancarios', [EmpleadoDatoBancarioController::class, 'mostrarDatosBancariosEmpleadoAuth']);


//Rutas Evaluacion-desempeno
Route::get('listar-evaluaciones-desempeno', [EmpleadoEvaluaciondesempenoController::class, 'listarEvaluacionesDesempeno']);
Route::get('total-evaluaciones-desempeno    ', [EmpleadoEvaluaciondesempenoController::class, 'obtenerTotalEvaluacionesDesempeno']);

//Rutas Experiencia Laboral
Route::get('total-experiencias-laborales', [EmpleadoExperiencialaboralController::class, 'obtenerTotalExperienciasLaborales']);
//asc-desc
Route::get('experiencias-laborales-ordenadas-por-fecha/{orden?}', [EmpleadoExperiencialaboralController::class, 'listarExperienciasLaboralesOrdenadasPorFecha']);
Route::get('listar-evaluaciones-desempeno', [EmpleadoExperiencialaboralController::class, 'mostrarDetallesEmpleadoYExperiencias']);

//Rutas Instrucciones Formales
Route::get('total-instrucciones-formales', [EmpleadoInstruccionformalController::class, 'obtenerTotalInstruccionesFormales']);
Route::get('instrucciones-formales-ordenadas-por-fecha/{orden?}', [EmpleadoInstruccionformalController::class, 'listarInstruccionesFormalesOrdenadasPorFecha']);
Route::get('listar-instrucciones-formales', [EmpleadoInstruccionformalController::class, 'mostrarDetallesEmpleadoEInstruccionesFormales']);