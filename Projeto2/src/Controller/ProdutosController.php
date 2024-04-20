<?php

namespace Andres\Controller;

use Andres\Model\DAO\ProdutoDAO;
use Andres\Model\DAO\CategoriaDAO;
use Andres\Model\Domain\Categoria;
use Andres\Model\Domain\Produto;

class ProdutosController
{
    public static function index()
    {
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar();
        require '../src/View/produtos/index.php';
    }
    public static function criar()
    {
        $categoriaDAO = new CategoriaDAO();
        $categorias = $categoriaDAO->consutlar();
        require '../src/View/produtos/criar.php';
    }
    public static function visualizar($params)
    {
        $id = $params[1];
        $produtoDAO = new ProdutoDAO();
        $resultado = $resultadoDAO->consultarPorId($id);
        $categoriaDAO = new CategoriaDAO();
        $categoria = $categoriaDAO->consultarPorId($resultado['id_categoria']);
        require '../src/View/produtos/visualizar.php';
    }
    public static function salvar()
    {
        $categoriaDAO = new CategoriaDAO();
        $categoria = $categoriaDAO->consultarPorId($_POST['categoria']);
        $produto = new Produto($_POST['nome'], $_POST['preco'], new Categoria($categoria['id'], $categoria['descricao']), id: 0);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)){
            $sucesso="Registro inserido com sucesso";
        } else {
            $falha = "Erro ao inserir registro";
        }
        $resultado =$produtoDAO->consultar();
        require '../src/View/produtos/index.php';
    }
}