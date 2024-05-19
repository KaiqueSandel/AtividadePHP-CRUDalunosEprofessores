<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Empresa {

    private $id;
    private $nome_fantasia;
    private $cnpj;
    private $receita;

    public function __construct($id, $nome_fantasia, $cnpj, $receita){
        $this->setId($id);
        $this->setNomeFantasia($nome_fantasia);
        $this->setCnpj($cnpj);
        $this->setReceita($receita);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNomeFantasia(){
        return $this->nome_fantasia;
    }

    public function setNomeFantasia($nome_fantasia){
        $this->nome_fantasia = $nome_fantasia;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getReceita(){
        return $this->receita;
    }

    public function setReceita($receita){
        $this->receita = $receita;
    }
}
