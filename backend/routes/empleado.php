<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmpleadoCapacitacionController;

//Rutas Capacitaciones
Route::get('/capacitaciones', [EmpleadoCapacitacionController::class, 'listarCapacitacionesPorEmpleadoAuth']);
Route::get('/capacitaciones/total', [EmpleadoCapacitacionController::class, 'obtenerTotalCapacitacionesPorEmpleadoAuth']);





