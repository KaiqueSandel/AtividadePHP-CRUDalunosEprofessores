<?php

namespace Andres\Controller;

use Andres\Model\DAO\ProdutoDAO;
use Andres\Model\DAO\CategoriaDAO;
use Andres\Model\Domain\Categoria;
use Andres\Model\Domain\Produto;
use Andres\View\produtos;

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
        $produtoDAO = new Produto();
        $resultado = $produtoDAO->consultar();
        require '../src/View/produtos/criar.php';
    }
}