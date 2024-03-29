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

// exercicio 3. Escreva um programa para calcular a soma dos dois valores de entrada. Se os dois valores forem iguais, retorne o triplo da soma. 
$r->get('/exer3/formulario', function(){
    include("exer3.html");
});
$r->post('/exer3/resposta', function($params){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;

    if ($valor1 == $valor2) {
        return "O triplo da soma é: " . (3 * $soma);
    } else {
        return "A soma é: {$soma}";
    }
});

// exercicio 4. Crie um algoritmo que solicite a entrada de um número, e exiba a tabuada de 0 a 10 de acordo com o número solicitado
$r->get('/exer4/formulario', function(){
    include("exer4.html");
});
$r->post('/exer4/resposta', function($params){
    $numero = $_POST['numero'];
    $tabuada = "";
    for ($i = 0; $i <= 10; $i++) {
        $tabuada .= "$numero X $i = " . ($numero * $i) . "<br>";
    }
    return $tabuada;
});

$r->get('/exer5/formulario', function(){
    include("exer5.html");
});
$r->post('/exer5/resposta', function($params){
    $numero = $_POST['numero'];
    $fatorial = 1;
    for ($i = $numero; $i > 1; $i--) {
        $fatorial *= $i;
    }
    return "O fatorial de $numero é: $fatorial";
});

// exercício 6. Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos seus valores. Caso os valores sejam iguais, informar o usuário e imprimir o valor em tela apenas uma vez. 
$r->get('/exer6/formulario', function(){
    include("exer6.html");
});
$r->post('/exer6/resposta', function($params){
    $a = $_POST['a'];
    $b = $_POST['b'];

    if ($a < $b) {
        return "$a $b";
    } elseif ($a > $b) {
        return "$b $a";
    } else {
        return "Números iguais: $a";
    }
});

// exercício 7. Faça um programa em PHP no qual leia um valor em metros e o converta em centímetros.
$r->get('/exer7/formulario', function(){
    include("exer7.html");
});
$r->post('/exer7/resposta', function($params){
    $metros = $_POST['metros'];
    $centimetros = $metros * 100;
    return "$metros metros equivalem a $centimetros centímetros.";
});

// exercício 8. Faça um programa em PHO para uma loja de tintas. O programa deverá pedir o tamanho em metros quadrados da área a ser pintada. Considere que a cobertura da tinta é de 1 litro para cada 3 metros quadrados e que a tinta é vendida em latas de 18 litros, que custam R$ 80,00. Informe ao usuário a quantidades de latas de tinta a serem compradas e o preço total
$r->get('/exer8/formulario', function(){
    include("exer8.html");
});
$r->post('/exer8/resposta', function($params){
    $metros_quadrados = $_POST['metros_quadrados'];
    $litros_tinta = $metros_quadrados / 3;
    $quantidade_latas = ceil($litros_tinta / 18); 
    $preco_total = $quantidade_latas * 80; 

    return "Quantidade de latas de tinta necessárias: $quantidade_latas<br>Preço total: R$ $preco_total";
});

// Exercício 9. Faça um script PHP que receba de um formulário HTML5 uma variável com o ano de nascimento de uma pessoa, crie uma constante com o ano atual, calcule e mostre: a. a idade dessa pessoa em anos; b. quantos dias esta pessoa já viveu; c. quantos anos essa pessoa terá em 2025
$r->get('/exer9/formulario', function(){
    include("exer9.html");
});
$r->post('/exer9/resposta', function($params){
    $ano_nascimento = $_POST['ano_nascimento'];
    $ano_atual = date("Y");
    $idade = $ano_atual - $ano_nascimento;
    $dias_vividos = $idade * 365;
    $idade_2025 = 2025 - $ano_nascimento;

    return "a) Idade: $idade anos<br>b) Dias vividos: $dias_vividos dias<br>c) Idade em 2025: $idade_2025 anos";
});

// exercicio 10. Programa que calcula o IMC de uma pessoa.
$r->get('/exer10/formulario', function(){
    include("exer10.html");
});

$r->post('/exer10/resposta', function($params){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura * $altura);
    if ($imc < 18.5) {
        $resultado = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $resultado = "Peso normal";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $resultado = "Acima do peso";
    } else {
        $resultado = "Obesidade";
    }

    return "Seu IMC é: " . number_format($imc, 2) . ". Você está classificado como: $resultado";
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());