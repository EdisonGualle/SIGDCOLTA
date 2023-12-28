<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmpleadoCapacitacionController;
use App\Http\Controllers\Employee\EmpleadoCargoController;
use App\Http\Controllers\Employee\EmpleadoContratoController;
use App\Http\Controllers\Employee\EmpleadoDatobancarioController;
use App\Http\Controllers\Employee\EmpleadoDepartamentoController;
use App\Http\Controllers\Employee\EmpleadoEvaluaciondesempenoController;
use App\Http\Controllers\Employee\EmpleadoExperiencialaboralController;
use App\Http\Controllers\Employee\EmpleadoInstruccionformalController;
use App\Http\Controllers\Employee\EmpleadoReferencialaboralController;


//Rutas Capacitaciones
Route::get('/capacitaciones', [EmpleadoCapacitacionController::class, 'listarCapacitacionesPorEmpleadoAuth']);
Route::get('/capacitaciones/total', [EmpleadoCapacitacionController::class, 'obtenerTotalCapacitacionesPorEmpleadoAuth']);

//Rutas Cargo
Route::get('informacion-empleado-cargo-departamento', [EmpleadoCargoController::class, 'mostrarInformacionEmpleadoCargoDepartamento']);





