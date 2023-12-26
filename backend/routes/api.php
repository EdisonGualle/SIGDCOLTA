<?php
use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


// Ingreso
Route::post('/users', [UserController::class, 'crearUsuario']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas con autenticación mediante Sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // Rutas específicas para el rol 'Administrador'
    Route::middleware('role:Admin')->group(function () {
        // Rutas del subgrupo 'administrador'
        Route::prefix('administrador')->group(function () {
            include('administrador.php');  // Incluye las rutas definidas en 'administrador.php'
        });
    });

    // Rutas específicas para el rol 'Empleado'
    Route::middleware('role:Empleado')->group(function () {
        // Rutas del subgrupo 'empleado'
        Route::prefix('empleado')->group(function () {
            include('empleado.php');  // Incluye las rutas definidas en 'empleado.php'
        });
    });
});

