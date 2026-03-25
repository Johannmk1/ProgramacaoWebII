<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

Route::get('/sobre', function () {
    return view('sobre');
});

Route::resource('/contato', ContatoController::class);

Route::get('/', function () {
    return view('welcome');
});
