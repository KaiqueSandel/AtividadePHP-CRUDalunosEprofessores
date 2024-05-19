<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Aluno {

    private $id;
    private $nome;
    private $cpf;
    private $turma;

    public function __construct($id, $nome, $cpf, $turma){
        $this->setId($id);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTurma($turma);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getTurma(){
        return $this->turma;
    }

    public function setTurma($turma){
        $this->turma = $turma;
    }
}
