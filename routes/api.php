<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PhysicianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/health-check', function (HealthCheckController $controller) {
    return $controller->checkHealth();
});

Route::apiResources([
    'patients' => PatientsController::class,
    'physicians' => PhysicianController::class,
]);
