<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmpleadoCapacitacionController;
use App\Http\Controllers\Employee\EmpleadoCargoController;
use App\Http\Controllers\Employee\EmpleadoContratoController;
use App\Http\Controllers\Employee\EmpleadoDepartamentoController;
use App\Http\Controllers\Employee\EmpleadoDatoBancarioController;
use App\Http\Controllers\Employee\EmpleadoDatosPersonalesController;
use App\Http\Controllers\Employee\EmpleadoEvaluaciondesempenoController;
use App\Http\Controllers\Employee\EmpleadoExperiencialaboralController;
use App\Http\Controllers\Employee\EmpleadoInstruccionformalController;
use App\Http\Controllers\Employee\SolicitarPermisoController;


//Rutas Capacitaciones
Route::get('mis-capacitaciones', [EmpleadoCapacitacionController::class, 'listarCapacitacionesPorEmpleadoAuth']);
Route::get('total-capacitaciones', [EmpleadoCapacitacionController::class, 'obtenerTotalCapacitacionesPorEmpleadoAuth']);

//Rutas Cargo
Route::get('/mi-cargo', [EmpleadoCargoController::class, 'miCargo']);

// Datos Personales 
Route::get('/mis-datos-personales', [EmpleadoDatosPersonalesController::class, 'misDatosPersonales']);

//Rutas Contrato
Route::get('/mis-contratos', [EmpleadoContratoController::class, 'listarContratosPorEmpleadoAuth']);

//Rutas Departamento
Route::get('/mi-departamento', [EmpleadoDepartamentoController::class, 'obtenerDatosEmpleadoAuth']);

//Rutas Dato Bancario
Route::get('/mis-datosbancarios', [EmpleadoDatoBancarioController::class, 'mostrarDatosBancariosEmpleadoAuth']);
Route::get('/total-datosbancarios', [EmpleadoDatoBancarioController::class, 'totalDatosBancariosEmpleadoActual']);


//Rutas Evaluacion-desempeno
Route::get('/mis-evaluacionesdesempeno', [EmpleadoEvaluaciondesempenoController::class, 'listarEvaluacionesDesempeno']);
Route::get('/total-evaluacionesdesempeno', [EmpleadoEvaluaciondesempenoController::class, 'obtenerTotalEvaluacionesDesempeno']);

//Rutas Experiencia Laboral
Route::get('/mis-experienciaslaborales', [EmpleadoExperiencialaboralController::class, 'mostrarDetallesEmpleadoYExperiencias']);

Route::get('/total-experienciaslaborales', [EmpleadoExperiencialaboralController::class, 'obtenerTotalExperienciasLaborales']);
//asc-desc
Route::get('/expLaborales-ordenadasxfecha/{orden?}', [EmpleadoExperiencialaboralController::class, 'listarExperienciasLaboralesOrdenadasPorFecha']);

//Rutas Instrucciones Formales
Route::get('/total-instruccionesformales', [EmpleadoInstruccionformalController::class, 'obtenerTotalInstruccionesFormales']);
Route::get('/Instformales-ordenadasxfecha/{orden?}', [EmpleadoInstruccionformalController::class, 'listarInstruccionesFormalesOrdenadasPorFecha']);
Route::get('/mis-instruccionesformales', [EmpleadoInstruccionformalController::class, 'mostrarDetallesEmpleadoEInstruccionesFormales']);


// Rutas permiso
Route::post('solicitar-permiso', [SolicitarPermisoController::class, 'crearPermiso']);
Route::get('/mis-permisos',[SolicitarPermisoController::class, 'listarMisPermisos']);

