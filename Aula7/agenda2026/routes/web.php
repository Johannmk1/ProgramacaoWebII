<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('contatos.index');
});

Route::resource('contatos',ContatoController::class);
