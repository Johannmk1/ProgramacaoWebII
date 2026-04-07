<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IMCController;
use App\Http\Controllers\SonoController;
use App\Http\Controllers\ViagemController;

Route::get('/imc', [IMCController::class, 'index']);
Route::post('/imc/calcular', [IMCController::class, 'calcular']);

Route::get('/sono', [SonoController::class, 'index']);
Route::post('/sono/avaliar', [SonoController::class, 'avaliar']);

Route::get('/viagem', [ViagemController::class, 'index']);
Route::post('/viagem/calcular', [ViagemController::class, 'calcular']);

Route::resource('/', HomeController::class);