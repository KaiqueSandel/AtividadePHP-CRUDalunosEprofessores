<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Carro {

    private $id;
    private $nome;
    private $marca;
    private $ano;

    public function __construct($id, $nome, $marca, $ano){
        $this->setId($id);
        $this->setNome($nome);
        $this->setMarca($marca);
        $this->setAno($ano);
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

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }
}
