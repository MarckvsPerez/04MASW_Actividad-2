<?php

use App\Http\Controllers\AdministrativoController;
use Illuminate\Support\Facades\Route;

Route::get('/hola', function () {
    return response()->json(['message' => 'Hola']);
});
