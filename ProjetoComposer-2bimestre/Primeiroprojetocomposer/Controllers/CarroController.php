<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CarroDAO;
use Php\Primeiroprojeto\Models\Domain\Carro;

class CarroController{

    public function index($params){
        $carroDAO = new CarroDAO();
        $resultado = $carroDAO->consultarTodos();
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
        require_once("../src/Views/carro/carro.php");
        }
        public function inserir($params){
            require_once("../src/Views/carro/inserir_carro.html");
        }
        
        public function novo($params){
            try {
                if (isset($_POST['nome'], $_POST['marca'], $_POST['ano'])) {
                    $nome = $_POST['nome'];
                    $marca = $_POST['marca'];
                    $ano = $_POST['ano'];
                    $carro = new Carro(0, $nome, $marca, $ano);
            
                    $carroDAO = new CarroDAO();
                    if ($carroDAO->inserir($carro)){
                        header("location: /carro/inserir/true");
                        exit;
                    } else {
                        throw new \Exception("Erro ao inserir carro no banco de dados.");
                    }
                } else {
                    throw new \Exception("Todos os campos do formulário devem ser preenchidos.");
                }
            } catch (\Exception $e) {
                header("location: /carro/inserir/false");
                exit;
            }
        }
        
        public function alterar($params){
            $carroDAO = new CarroDAO();
            $resultado = $carroDAO->consultar($params[1]);
            require_once("../src/Views/carro/alterar_carro.php");
        }
        
        public function excluir($params){
            $carroDAO = new CarroDAO();
            $resultado = $carroDAO->consultar($params[1]);
            require_once("../src/Views/carro/excluir_carro.php");
        }
        
        public function editar($params){
            $carro = new Carro($_POST['id'], $_POST['nome'], $_POST['marca'], $_POST['ano']);
            $carroDAO = new CarroDAO();
            if ($carroDAO->alterar($carro)) {
                header("location: /carro/alterar/true");
            } else {
                header("location: /carro/alterar/false");
            }
        }    
        
        public function deletar($params){
            $carroDAO = new CarroDAO();
            if ($carroDAO->excluir($_POST['id'])){
                header("location: /carro/excluir/true");
            } else {
                header("location: /carro/excluir/false");
            }
        }
    }        