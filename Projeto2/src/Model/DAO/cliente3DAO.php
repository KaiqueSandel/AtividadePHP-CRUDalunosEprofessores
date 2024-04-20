<?php

namespace Andres\Model\DAO;

use Andres\Model\Domain\Categoria;

class Cliente3DAO
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
    public function inserir(Cliente3DAO $cliente3)
    {
        try{
            $sql = "INSERT INTO cliente3 (nome,endereco, numero_conta) values (:nome,:endereco,:numero_conta)";
            $p = $this->dao->getConexao()->prepre($sql);
            $p->bindValue(":nome", $this->antiInjection($categoria->getNome()));
            $p->bindValue(":endereco", $this->antiInjection($categoria->getEndereco()));
            $p->bindValue(":numero_conta", $this->antiInjection($categoria->getNumeroConta()->getId()()));
            return $p->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar()
    {
        try {
            $sql = "SELECT * from cliente3";
            return $this->dao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    } 
    public function consultarPorId(int $id)
    {
        try {
            $sql = "SELECT * from cliente3 where id = :id";
            $p = this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
}
