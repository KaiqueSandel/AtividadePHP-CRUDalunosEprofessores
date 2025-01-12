<?php

namespace Andres\Controller;

use Andres\Model\DAO\AlunoDAO;
use Andres\Model\Domain\Aluno;
use Andres\View\Alunos;
class AlunoController
{
    public static function index()
    {
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultar();
        require '../src/View/Alunos/index.php';
    }
    public function inserir($params) {
        require_once("../src/Views/Alunos/criar.php");
    }

    public function criar($params) {
        $aluno = new Aluno(0, $_POST['nome'], $_POST['endereco'], $_POST['telefone']);
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultar();
        if ($alunoDAO->inserir($aluno)) {
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }
}
