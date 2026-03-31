<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\SonoController;

Route::get('/', function () {
    return view('home');
});

Route::get('/imc', [ImcController::class, 'index']);
Route::post('/imc/calcular', [ImcController::class, 'calcular']);

Route::get('/sono', [SonoController::class, 'index']);
Route::post('/sono/avaliar', [SonoController::class, 'avaliar']);
