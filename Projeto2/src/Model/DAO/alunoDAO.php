<?php

namespace Andres\Model\DAO;

use Andres\Model\Domain\Categoria;

class CarroDAO
{
    private DAO $dao;
    public function __construct()
    {
        $this->dao = new DAO();
    }
    private function antiInjection($attr,$html = true)
    {
        $attr = preg_replace(strtolower("/(from|select|insert|delete|where|drop table|show tables|\|--|\\\\)/","",$attr));
        if (!is_array($attr)){
            $attr = trim($attr);
            $attr = strip_tags($attr);
            $attr =  addslashes($attr);
        }
        return $attr;
    }
    public function inserir(CarroDAO $carro)
    {
        try{
            $sql = "INSERT INTO aluno (nome, endereco, telefone) values (:nome,:endereco,:telefone)";
            $p = $this->dao->getConexao()->prepre($sql);
            $p->bindValue(":nome", $this->antiInjection($carro->getNome()));
            $p->bindValue(":endereco", $this->antiInjection($carro->getEndereco()));
            $p->bindValue(":telefone", $this->antiInjection($carro->getTelefone()));
            return $p->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar()
    {
        try {
            $sql = "SELECT * from aluno";
            return $this->dao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    } 
    public function consultarPorId(int $id)
    {
        try {
            $sql = "SELECT * FROM aluno where id = :id";
            $p = this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
}
