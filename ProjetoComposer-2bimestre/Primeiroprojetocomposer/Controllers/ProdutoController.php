<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProdutoDAO;
use Php\Primeiroprojeto\Models\Domain\Produto;

class ProdutoController{

    public function index($params){
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else 
            $mensagem = "";
        require_once("../src/Views/produto/produto.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/produto/inserir_produto.html");
    }

    public function novo($params){
        try {
            if (isset($_POST['nome'], $_POST['valor'], $_POST['categoria_id'])) {
                $nome = $_POST['nome'];
                $valor = $_POST['valor'];
                $categoria_id = $_POST['categoria_id'];
                $produto = new Produto(0, $nome, $valor, $categoria_id);
        
                $produtoDAO = new ProdutoDAO();
                if ($produtoDAO->inserir($produto)){
                    header("location: /produto/inserir/true");
                    exit;
                } else {
                    throw new \Exception("Erro ao inserir produto no banco de dados.");
                }
            } else {
                throw new \Exception("Todos os campos do formulário devem ser preenchidos.");
            }
        } catch (\Exception $e) {
            header("location: /produto/inserir/false");
            exit;
        }
    }

    public function alterar($params){
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar($params[1]);
        require_once("../src/Views/produto/alterar_produto.php");
    }

    public function excluir($params){
        $produtoDAO = new ProdutoDAO();
        $resultado = $produtoDAO->consultar($params[1]);
        require_once("../src/Views/produto/excluir_produto.php");
    }

    public function editar($params){
        $produto = new Produto($_POST['id'], $_POST['nome'], $_POST['valor'], $_POST['categoria_id'], $_POST['descricao']);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->alterar($produto)) {
            header("location: /produto/alterar/true");
        } else {
            header("location: /produto/alterar/false");
        }
    }    

    public function deletar($params){
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->excluir($_POST['id'])){
            header("location: /produto/excluir/true");
        } else {
            header("location: /produto/excluir/false");
        }
    }
}
