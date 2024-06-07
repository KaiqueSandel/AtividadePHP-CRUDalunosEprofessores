<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resources(
[
    'clientes' => ClienteController::class,
    #produtos => ProdutosController::class
]
);

Route::get('/clientes/delete/{id}' , [ClienteController::class, 'delete']);