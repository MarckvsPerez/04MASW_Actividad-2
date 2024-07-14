<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\AsesoriaController;
use App\Http\Controllers\BrindaController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\ComunidadPropietariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ConsultoriaIntegralController;
use App\Http\Controllers\ContrataController;
use App\Http\Controllers\ContratoControlHorarioController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ContratoMultipleController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\TrabajadorController;

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

Route::controller(InstitucionController::class)->prefix('institucion')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});


Route::controller(ConsultoriaIntegralController::class)->prefix('consultoria_integrals')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(TrabajadorController::class)->prefix('trabajador')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(AsesoriaController::class)->prefix('asesoria')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(EmpresaController::class)->prefix('empresa')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(AdministrativoController::class)->prefix('administrativo')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(FacturaController::class)->prefix('facturas')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(ContratoController::class)->prefix('contrato')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(ContratoMultipleController::class)->prefix('contrato_multiple')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(ContratoControlHorarioController::class)->prefix('contrato_horario')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(ComunidadPropietariosController::class)->prefix('comunidad')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(BrindaController::class)->prefix('brinda')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id_servicio}/{cif}', 'show');
    Route::delete('/{id_servicio}/{cif}', 'destroy');
});

Route::controller(ContrataController::class)->prefix('contrata')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{id_servicio}/{cif}', 'show');
    Route::put('/{id_servicio}/{cif}', 'update');
    Route::delete('/{id_servicio}/{cif}', 'destroy');
});
