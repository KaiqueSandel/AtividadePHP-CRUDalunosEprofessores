<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 
    'Php\Primeiroprojeto\Controllers\HomeController@olaMundo');

$r->get('/olapessoa/{nome}', function($params){ 
    return 'Olá'.$params[1]; 
} );

$r->get('/exer1/formulario', 
    'Php\Primeiroprojeto\Controllers\HomeController@formExer1');

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exer4/formulario', function(){
    require_once('exer4.html');
});

$r->post('/exer4/resposta', function(){
    $valor = $_POST['valor1'];
    $resposta = "";
    for ($i=1; $i<=10; $i++){
        $resultado = $valor * $i;
        $resposta .= "$valor x $i = $resultado<br/>";
    }
    return $resposta;
});

//Chamando o formulário para inserir categoria
$r->get('/categoria/inserir',
    'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo',
    'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

$r->get('/categoria', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');
    
$r->get('/categoria/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

$r->post('/categoria/editar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@editar');
    
$r->post('/categoria/deletar',
    'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');

//Rotas produto
$r->get('/produto/inserir',
    'Php\Primeiroprojeto\Controllers\ProdutoController@inserir');

$r->post('/produto/novo',
    'Php\Primeiroprojeto\Controllers\ProdutoController@novo');

$r->get('/produto', 
    'Php\Primeiroprojeto\Controllers\ProdutoController@index');

$r->get('/produto/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\ProdutoController@index');

$r->get('/produto/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProdutoController@alterar');

$r->get('/produto/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\ProdutoController@excluir');

$r->post('/produto/editar',
    'Php\Primeiroprojeto\Controllers\ProdutoController@editar');

$r->post('/produto/deletar',
    'Php\Primeiroprojeto\Controllers\ProdutoController@deletar'); 

//Rotas aluno
$r->get('/aluno/inserir',
    'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo',
    'Php\Primeiroprojeto\Controllers\AlunoController@novo');

$r->get('/aluno', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');

$r->get('/aluno/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\AlunoController@index');

$r->get('/aluno/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunoController@alterar');

$r->get('/aluno/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\AlunoController@excluir');

$r->post('/aluno/editar',
    'Php\Primeiroprojeto\Controllers\AlunoController@editar');

$r->post('/aluno/deletar',
    'Php\Primeiroprojeto\Controllers\AlunoController@deletar');

//Rota carro
$r->get('/carro/inserir',
    'Php\Primeiroprojeto\Controllers\CarroController@inserir');

$r->post('/carro/novo',
    'Php\Primeiroprojeto\Controllers\CarroController@novo');

$r->get('/carro', 
    'Php\Primeiroprojeto\Controllers\CarroController@index');

$r->get('/carro/{acao}/{status}', 
    'Php\Primeiroprojeto\Controllers\CarroController@index');

$r->get('/carro/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\CarroController@alterar');

$r->get('/carro/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\CarroController@excluir');

$r->post('/carro/editar',
    'Php\Primeiroprojeto\Controllers\CarroController@editar');

$r->post('/carro/deletar',
    'Php\Primeiroprojeto\Controllers\CarroController@deletar');

//Rota empresa


$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}



