<?php

use App\Http\Controllers\ComercialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;

Route::get('/hola', function () {
    return response()->json(['message' => 'Hola']);
});

Route::controller(ServicioController::class)->prefix('servicios')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(ComercialController::class)->prefix('comercials')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});
