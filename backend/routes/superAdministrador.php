<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Config\ConfiguracionController;
use App\Http\Controllers\Admin\AsignarRolController;


//Asignar Roles Routes
Route::post('/asignar-rol', [AsignarRolController::class, 'asignarRolUsuario']);
Route::delete('/eliminar-rol', [AsignarRolController::class, 'eliminarRolUsuario']);



//CONFIGURACION routes
Route::get('/configuraciones', [ConfiguracionController::class, 'obtenerConfiguraciones']);
Route::get('/configuraciones/{clave}', [ConfiguracionController::class, 'obtenerConfiguracionPorClave']);
Route::put('/configuraciones/{clave}', [ConfiguracionController::class, 'actualizarConfiguracion']);
