<?php

namespace Andres\Controller;

use Andres\Model\DAO\Cliente3DAO; 
use Andres\Model\Domain\Categoria;
use Andres\Model\Domain\Cliente3;

class Cliente3Controller
{
    public static function index()
    {
        $cliente3DAO = new Cliente3DAO();
        $resultado = $cliente3DAO->consultar();
        require '../src/View/Clientes/index.php';
    }
    public function inserir($params) {
        require_once("../src/Views/Clientes/criar.php");
    }

    public function criar($params) {
        $clientes = new Cliente3(0, $_POST['nome'], $_POST['endereco'], $_POST['numero_conta']);
        $cliente3DAO = new Cliente3DAO();
        $resultado = $cliente3DAO->consultar();
        if ($cliente3DAO->inserir($clientes)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}
