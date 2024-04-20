<?php

namespace Andres\Controller;

use Andres\Model\DAO\CarroDAO;
use Andres\Model\Domain\Carro;

class CarroController
{
    public static function index()
    {
        $carroDAO = new CarroDAO();
        $resultado = $carroDAO->consultar();
        require '../src/View/Carros/index.php';
    }
    public function inserir($params) {
        require_once("../src/Views/Carros/criar.php");
    }

    public function criar($params) {
        $carro = new Carro(0, $_POST['nome'], $_POST['marca'], $_POST['modelo']);
        $carroDAO = new CarroDAO();
        $resultado = $carroDAO->consultar();
        if ($carroDAO->inserir($carro)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}
