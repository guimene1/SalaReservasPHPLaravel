<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return redirect()->route('reservas.index');
});

Route::resource('salas', SalaController::class)->only(['index', 'create', 'store']);
Route::resource('reservas', ReservaController::class)->only(['index', 'create', 'store']);
