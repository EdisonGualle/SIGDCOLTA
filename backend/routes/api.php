<?php

use Illuminate\Support\Facades\Route;
//Auth
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\RestablecerContraseñaController;
use App\Http\Controllers\Calendario_actividades_gad_Controller;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VacacionController;
use App\Models\Calendario_actividades_gad;
use App\Services\ContratoService;
use App\Services\RegistroAsistenciaService;
use Illuminate\Http\JsonResponse;



/// Pruebas 

include('administrador.php');


// Ingreso
Route::post('/ingresar', [AuthController::class, 'ingresar']);




// Recuperar contraseña 
Route::post('/recuperar-contraseña', [RestablecerContraseñaController::class, 'recuperarContraseña']);

// Rutas con autenticación mediante Sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/cambiar-contraseña', [UsuarioController::class, 'cambiarContrasena']);

    // Rutas específicas para el rol 'SuperAdministrador'
    Route::middleware('role:Super Administrador')->group(function () {
        // Rutas del subgrupo 'administrador'
        Route::prefix('administrador')->group(function () {
            include('superAdministrador.php');
            include('administrador.php');
            include('empleado.php');
        });
    });

    // Rutas específicas para el rol 'SuperAdministrador' o 'Administrador' 
    Route::middleware('role:Super Administrador|Administrador')->group(function () {
        // Rutas del subgrupo 'administrador'
        Route::prefix('administrador')->group(function () {
            include('administrador.php');
            include('empleado.php');
        });
    });

    // Rutas específicas para el rol 'Empleado'
    Route::middleware('role:Empleado')->group(function () {
        // Rutas del subgrupo 'empleado'
        Route::prefix('empleado')->group(function () {
            include('empleado.php');
            include('administrador.php');
        });
    });

    // Salir del sistema
    Route::post('/salir', [AuthController::class, 'salir']);
});


//Ruta de fallback para manejar 404
Route::fallback(function () {
    // Respuesta JSON personalizada para error 404
    return response()->json(['error' => 'Ruta no encontrada.'], JsonResponse::HTTP_NOT_FOUND);
});



//RUTAS PARA SER INSERTADAS POR ANGEL MELENDRES
Route::get('/calendario_actividades_gad', [Calendario_actividades_gad_Controller::class, 'index']);
Route::get('/calendario_actividades_gad/{id}', [Calendario_actividades_gad_Controller::class, 'show']);
Route::post('/calendario_actividades_gad', [Calendario_actividades_gad_Controller::class, 'store']);
Route::put('/calendario_actividades_gad/{id}', [Calendario_actividades_gad_Controller::class, 'update']);
Route::delete('/calendario_actividades_gad/{id}', [Calendario_actividades_gad_Controller::class, 'destroy']);



Route::get('/obtenerDiasLaboradosEmpleado', [Calendario_actividades_gad_Controller::class, 'obtenerDiasLaboradosPorEmpleado']);
Route::get('/obtenerDiasLaborablesEmpleado', [Calendario_actividades_gad_Controller::class, 'obtenerDiasLaborablesEmpleado']);
Route::get('/cantidadHorasAtrasoEmpleado', [RegistroAsistenciaService::class, 'cantidadHorasAtrasoEmpleado']);
Route::post('/registrarActividadesMesesAuto', [Calendario_actividades_gad_Controller::class, 'registrarActividadesMesesAuto']);
Route::post('/calendario_actividades_gad/registrarRangoFechas', [Calendario_actividades_gad_Controller::class, 'registrarRangoFechas']);
