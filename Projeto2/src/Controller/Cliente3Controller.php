<?php

namespace Andres\Controller;

use Andres\DAO\Cliente3DAO;
use Andres\DAO\CategoriaDAO;
use Andres\Domain\Categoria;
use Andres\Domain\Cliente3;

class Cliente3Controller
{
    public static function index()
    {
        $cliente3DAO = new Cliente3DAO();
        $resultado = $cliente3DAO->consultar();
        require '../src/View/clientes/index.php';
    }
    public static function criar()
    {
        $cliente3DAO = new Cliente3DAO();
        $categorias = $cliente3DAO->consutlar();
        require '../src/View/clientes/criar.php';
    }
    public static function visualizar($params)
    {
        $id = $params[1];
        $cliente3DAO = new Cliente3DAO();
        $resultado = $resultadoDAO->consultarPorId($id);
        $categoriaDAO = new Cliente3DAO();
        $categoria = $categoriaDAO->consultarPorId($resultado['id']);
        require '../src/View/clientes/visualizar.php';
    }
    public static function salvar()
    {
        $cliente3DAO = new Cliente3DAO();
        $cliente = $cliente3DAO->consultarPorId($_POST['categoria']);
        $produto = new Cliente3($_POST['nome'], $_POST['preco'], new Categoria($categoria['id'], $categoria['descricao']), id: 0);
        $produtoDAO = new Cliente3DAO();
        if ($produtoDAO->inserir($produto)){
            $sucesso="Registro inserido com sucesso";
        } else {
            $falha = "Erro ao inserir registro";
        }
        $resultado =$produtoDAO->consultar();
        require '../src/View/produtos/index.php';
    }
}