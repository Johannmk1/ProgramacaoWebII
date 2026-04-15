<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contatos', ContatosController::class);
