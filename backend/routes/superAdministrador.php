<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Config\ConfiguracionController;
use App\Http\Controllers\Admin\AsignarRolController;


//Asignar Roles
Route::post('/asignar-rol', [AsignarRolController::class, 'asignarRol']);

//CONFIGURACION routes
Route::get('/configuraciones', [ConfiguracionController::class, 'obtenerConfiguraciones']);
Route::get('/configuraciones/{clave}', [ConfiguracionController::class, 'obtenerConfiguracionPorClave']);
Route::put('/configuraciones/{clave}', [ConfiguracionController::class, 'actualizarConfiguracion']);
