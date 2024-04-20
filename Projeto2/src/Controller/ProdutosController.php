<?php

namespace Andres\Controller;

use Andres\Model\DAO\ProdutoDAO;
use Andres\Model\Domain\Produto;
use Andres\View\Produtos;

class ProdutosController
{
    public static function index()
    {
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar();
        require '../src/View/Produtos/index.php';
    }
    public function criar($params) {
        $produto = new Produto(0, $_POST['nome'], $_POST['valor'], $_POST['id_categoria']);
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar();
        if ($produtoDAO->inserir($produto)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}