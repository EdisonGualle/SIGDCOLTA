<?php
use Illuminate\Support\Facades\Route;

//Auth
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RestablecerContraseñaController;

// Ingreso
Route::post('/users', [UserController::class, 'crearUsuario']);
Route::post('/ingresar', [AuthController::class, 'ingresar']);

// Recuperar contraseña 
Route::post('/recuperar-contraseña', [RestablecerContraseñaController::class,'recuperarContraseña']);



// Rutas con autenticación mediante Sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // Rutas específicas para el rol 'SuperAdministrador' o 'Administrador' 
    Route::middleware('role:Super Administrador|Administrador')->group(function () {
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

    // Salir del sistema
    Route::post('/salir', [AuthController::class, 'salir']);
});


// Ruta de fallback para manejar 404
// Route::fallback(function () {
//     // Respuesta JSON personalizada para error 404
//     return response()->json(['error' => 'Ruta no encontrada.'], JsonResponse::HTTP_NOT_FOUND);
// });
