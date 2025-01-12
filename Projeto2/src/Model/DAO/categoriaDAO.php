<?php

namespace Andres\Model\DAO;

use Andres\Model\Domain\Categoria;

class CategoriaDAO
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
    public function inserir(Categoria $categoria)
    {
        try{
            $sql = "insert into categoria {descricao} values {:descricao}";
            $p = $this->dao->getConexao()->prepre($sql);
            $p->bindValue(":descricao", $this->antiInjection($categoria->getDescricao()));
            return $p->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar()
    {
        try {
            $sql = "select * from categoria";
            return $this->dao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    } 
    public function consultarPorId(int $id)
    {
        try {
            $sql = "select * from categoria where id = :id";
            $p = this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
}