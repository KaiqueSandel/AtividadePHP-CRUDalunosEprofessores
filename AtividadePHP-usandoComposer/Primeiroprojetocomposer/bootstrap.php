<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS


# exercicio 1. Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor é positivo, negativo ou igual a zero.
$r->get('/exer1/formulario', function(){
    include("exer1.html");
});
$r->post('/exer1/resposta', function($params){
    $numero = $_POST['numero'];

    if ($numero > 0) {
        return "Valor Positivo";
    } elseif ($numero < 0) {
        return "Valor Negativo";
    } else {
        return "Igual a Zero";
    }
});

// exercicio 2. Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima a posição do menor valor na sequência de entrada. 
$r->get('/exer2/formulario', function(){
    include("exer2.html");
});
$r->post('/exer2/resposta', function($params){
    $numeros = $_POST['numeros'];
    $numeros_array = explode(",", $numeros);
    $menor_valor = min($numeros_array);
    $posicao_menor = array_search($menor_valor, $numeros_array);
    return "O menor valor é $menor_valor e está na posição $posicao_menor na sequência.";
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());