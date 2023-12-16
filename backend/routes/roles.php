<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\AuthController;


use App\Http\Controllers\CargoController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas AUTH
Route::post('/registro', [AuthController::class, 'registro']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas de prueba ---- Cuando el usuario este logueado permite ciertas rutas 
// (puedes volver a habilitar esto si lo necesitas)
// Route::middleware('auth:sanctum')->group(function(){
    //Cerrar sesion
//     Route::post('logout', [AuthController::class, 'logout']); 
// });

// Rutas protegidas por roles de administrador
Route::group(['middleware' => ['auth:sanctum', 'role:Admin']], function () {
    Route::post('/cargos', [CargoController::class, 'crearCargo']);
    Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']);
    Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']);
    Route::post('logout', [AuthController::class, 'logout']); 
});

// Rutas protegidas por roles de administrador y empleados
Route::group(['middleware' => ['auth:sanctum', 'role:Admin|Empleado']], function () {
    Route::get('/cargos', [CargoController::class, 'listarCargos']);
    Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']);
    Route::post('logout', [AuthController::class, 'logout']); 
});
