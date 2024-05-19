<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\EmpresaDAO;
use Php\Primeiroprojeto\Models\Domain\Empresa;

class EmpresaController{

    public function index($params){
        $empresaDAO = new EmpresaDAO();
        $resultado = $empresaDAO->consultarTodos();
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
        require_once("../src/Views/empresa/empresa.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/empresa/inserir_empresa.html");
    }

    public function novo($params){
        try {
            if (isset($_POST['nome_fantasia'], $_POST['cnpj'], $_POST['receita'])) {
                $nome_fantasia = $_POST['nome_fantasia'];
                $cnpj = $_POST['cnpj'];
                $receita = $_POST['receita'];
                $empresa = new Empresa(0, $nome_fantasia, $cnpj, $receita);
        
                $empresaDAO = new EmpresaDAO();
                if ($empresaDAO->inserir($empresa)){
                    header("location: /empresa/inserir/true");
                    exit;
                } else {
                    throw new \Exception("Erro ao inserir empresa no banco de dados.");
                }
            } else {
                throw new \Exception("Todos os campos do formulário devem ser preenchidos.");
            }
        } catch (\Exception $e) {
            header("location: /empresa/inserir/false");
            exit;
        }
    }

    public function alterar($params){
        $empresaDAO = new EmpresaDAO();
        $resultado = $empresaDAO->consultar($params[1]);
        require_once("../src/Views/empresa/alterar_empresa.php");
    }

    public function excluir($params){
        $empresaDAO = new EmpresaDAO();
        $resultado = $empresaDAO->consultar($params[1]);
        require_once("../src/Views/empresa/excluir_empresa.php");
    }

    public function editar($params){
        $empresa = new Empresa($_POST['id'], $_POST['nome_fantasia'], $_POST['cnpj'], $_POST['receita']);
        $empresaDAO = new EmpresaDAO();
        if ($empresaDAO->alterar($empresa)) {
            header("location: /empresa/alterar/true");
        } else {
            header("location: /empresa/alterar/false");
        }
    }    

    public function deletar($params){
        $empresaDAO = new EmpresaDAO();
        if ($empresaDAO->excluir($_POST['id'])){
            header("location: /empresa/excluir/true");
        } else {
            header("location: /empresa/excluir/false");
        }
    }
}

