<?php

use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UsuarioController;
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


Route::get('/unidades', [UnidadController::class, 'index']);
Route::get('/unidades/{id}', [UnidadController::class, 'show']);
Route::post('/unidades', [UnidadController::class, 'store']);
Route::put('/unidades/{id}', [UnidadController::class, 'update']);
Route::delete('/unidades/{id}', [UnidadController::class, 'destroy']);


Route::get('/capacitaciones', [CapacitacionController::class, 'index']);
Route::get('/capacitaciones/{id}', [CapacitacionController::class, 'show']);
Route::post('/capacitaciones', [CapacitacionController::class, 'store']);
Route::put('/capacitaciones/{id}', [CapacitacionController::class, 'update']);
Route::delete('/capacitaciones/{id}', [CapacitacionController::class, 'destroy']);


Route::get('/departamentos', [DepartamentoController::class, 'index']);
Route::get('/departamentos/{id}', [DepartamentoController::class, 'show']);
Route::post('/departamentos', [DepartamentoController::class, 'store']);
Route::put('/departamentos/{id}', [DepartamentoController::class, 'update']);
Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy']);


Route::get('/cargos', [CargoController::class, 'index']);
Route::get('/cargos/{id}', [CargoController::class, 'show']);
Route::post('/cargos', [CargoController::class, 'store']);
Route::put('/cargos/{id}', [CargoController::class, 'update']);
Route::delete('/cargos/{id}', [CargoController::class, 'destroy']);



Route::get('/estados', [EstadoController::class, 'index']);
Route::get('/estados/{id}', [EstadoController::class, 'show']);
Route::post('/estados', [EstadoController::class, 'store']);
Route::put('/estados/{id}', [EstadoController::class, 'update']);
Route::delete('/estados/{id}', [EstadoController::class, 'destroy']);


Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);


Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);



Route::get('/contratos', [ContratoController::class, 'index']);
Route::get('/contratos/{id}', [ContratoController::class, 'show']);
Route::post('/contratos', [ContratoController::class, 'store']);
Route::put('/contratos/{id}', [ContratoController::class, 'update']);
Route::delete('/contratos/{id}', [ContratoController::class, 'destroy']);

Route::get('/tiposContratos', [TipoContratoController::class, 'index']);
Route::get('/tiposContratos/{id}', [TipoContratoController::class, 'show']);
Route::post('/tiposContratos', [TipoContratoController::class, 'store']);
Route::put('/tiposContratos/{id}', [TipoContratoController::class, 'update']);
Route::delete('/tiposContratos/{id}', [TipoContratoController::class, 'destroy']);


Route::get('/residencias', [ResidenciaController::class, 'index']);
Route::get('/residencias/{id}', [ResidenciaController::class, 'show']);
Route::post('/residencias', [ResidenciaController::class, 'store']);
Route::put('/residencias/{id}', [ResidenciaController::class, 'update']);
Route::delete('/residencias/{id}', [ResidenciaController::class, 'destroy']);