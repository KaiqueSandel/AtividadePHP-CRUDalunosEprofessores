<?php

use Andres\Controller\CategoriaController;
use Andres\Controller\ProdutoController;
use Andres\Router;

require __DIR__ . '/vendor/autoload.php';
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new  Router($method, $path);
$router->get('/ola-{nome}','Andres\Controller\HomeController::index');

//Tabela 1
$router->get(route: '/produtos', action:'Andres\Controller\ProdutosController::index');
$router->post(route: '/produtos/criar', action:'Andres\Controller\ProdutosController::criar');

//Tabela 2
$router->get(route: '/clientes', action:'Andres\Controller\Cliente3Controller::index');
$router->post(route: '/clientes/criar', action:'Andres\Controller\Cliente3Controller::criar');

//Tabela 3
$router->get(route: '/carro', action:'Andres\Controller\CarroController::index');
$router->post(route: '/carro/criar', action:'Andres\Controller\CarroController::criar');

//Tabela 4
$router->get(route: '/aluno', action:'Andres\Controller\AlunoController::index');
$router->post(route: '/aluno/criar', action:'Andres\Controller\AlunoController::criar');

$result = $router->handler();
if(!$result) {
    http_response_code(404);
    echo 'Página não encontrada!';
    die();
}
if ($result instanceof Clouse){
    echo $result($router->getParams());
}
elseif (is_string($result)){
    $result = explode('::',$result);
    $controller = new $result[0];
    $action = $result[1];
    echo $controller->$action($router->getParams());
}