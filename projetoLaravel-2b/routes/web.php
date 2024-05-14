<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bem-vindo',function(){
    return "Seja bem vindo!";
});

Route::get('/exer1',function(){
    return view('/exer1');
});

Route::post('/exer1resp',function(Request $request){
    $valor = $request->input('valor1');
    return $valor;
});