<?php

namespace Andres\Controller;

use Andres\Model\DAO\Cliente3DAO; // Importe a classe Cliente3DAO aqui
use Andres\Model\Domain\Categoria;
use Andres\Model\Domain\Produto;

class Cliente3Controller
{
    public static function index()
    {
        $cliente3DAO = new Cliente3DAO();
        $resultado = $cliente3DAO->consultar();
        require '../src/View/clientes/index.php';
    }
    public function inserir($params) {
        require_once("../src/Views/clientes/criar.php");
    }

    public function criar($params) {
        $clientes = new Cliente3(0, $_POST['nome'], $_POST['endereco'], $_POST['numero_conta']);
        $cliente3DAO = new Cliente3DAO();
        $resultado = $cliente3DAO->consultar();
        if ($$cliente3DAO->inserir($clientes)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}
