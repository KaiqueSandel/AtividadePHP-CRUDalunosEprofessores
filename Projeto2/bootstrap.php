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
$router->get(route: '/produtos/criar', action:'Andres\Controller\ProdutosController::criar');
$router->get(route: '/produtos/salvar', action:'Andres\Controller\ProdutosController::salvar');
$router->get(route: '/produtos/alterar/{id}', action:'Andres\Controller\ProdutosController::alterar');

//Tabela 2
$router->get(route: '/clientes', action:'Andres\Controller\Cliente3Controller::index');
$router->get(route: '/clientes/criar', action:'Andres\Controller\Cliente3Controller::criar');
$router->get(route: '/clientes/salvar', action:'Andres\Controller\Cliente3Controller::salvar');
$router->get(route: '/clientes/alterar/{id}', action:'Andres\Controller\Cliente3Controller::alterar');

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