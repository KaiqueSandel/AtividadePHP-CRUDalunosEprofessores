<?php

namespace Andres\Model\DAO;

use Andres\Model\Domain\Categoria;

class ProdutoDAO
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
    public function inserir(Produto $produto)
    {
        try{
            $sql = "INSERT INTO produto (nome,preco, id_categoria) values (:nome,:preco,:id_categoria)";
            $p = $this->dao->getConexao()->prepre($sql);
            $p->bindValue(":nome", $this->antiInjection($categoria->getNome()));
            $p->bindValue(":preco", $this->antiInjection($categoria->getPreco()));
            $p->bindValue(":id_categoria", $this->antiInjection($categoria->getCategoria()->getId()()));
            return $p->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    public function consultar()
    {
        try {
            $sql = "SELECT * from produto";
            return $this->dao->getConexao()->query($sql);
        } catch (\Exception $e){
            return 0;
        }
    } 
    public function consultarPorId(int $id)
    {
        try {
            $sql = "SELECT * from produto where id = :id";
            $p = this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
}