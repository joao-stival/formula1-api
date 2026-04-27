<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\RaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FavoriteDriverController;
use App\Http\Controllers\LoginController;

// Rotas públicas de autenticação
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rotas protegidas por JWT
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    
    Route::apiResource('users', UserController::class);
    Route::put('users/{id}/toggle-admin', [UserController::class, 'toggleAdmin']);
    Route::apiResource('teams', TeamController::class);
    Route::apiResource('drivers', DriverController::class);
    Route::get('favorites/drivers', [FavoriteDriverController::class, 'index']);
    Route::post('favorites/drivers', [FavoriteDriverController::class, 'store']);
    Route::delete('favorites/drivers/{driverId}', [FavoriteDriverController::class, 'destroy']);
    Route::apiResource('adresses', AdressController::class);
    Route::apiResource('circuits', CircuitController::class);
    Route::apiResource('races', RaceController::class);
});

?>


