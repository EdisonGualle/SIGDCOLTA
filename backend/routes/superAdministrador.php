<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Config\ConfiguracionController;
use App\Http\Controllers\Admin\AsignarRolController;


// ASIGNAR ROL routes
// Asignar rol de determinado usuario  -  los parametros se reciben por Request $request
Route::post('/asignar-rol', [AsignarRolController::class, 'asignarRolUsuario']);
Route::delete('/eliminar-rol/{usuario}', [AsignarRolController::class, 'eliminarRolUsuario']);
// Listar todos los usuarios con roles
Route::get('/usuarios-rol', [AsignarRolController::class, 'listarUsuariosConRoles']);
// Listar usuarios por rol -
Route::get('/usuarios/{rol}', [AsignarRolController::class, 'listarUsuariosPorRol']);

//CONFIGURACION routes
Route::get('/configuraciones', [ConfiguracionController::class, 'obtenerConfiguraciones']);
Route::get('/configuraciones/{clave}', [ConfiguracionController::class, 'obtenerConfiguracionPorClave']);
Route::put('/configuraciones/{clave}', [ConfiguracionController::class, 'actualizarConfiguracion']);
