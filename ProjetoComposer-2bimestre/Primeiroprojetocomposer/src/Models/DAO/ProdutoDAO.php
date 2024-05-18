<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Produto;

class ProdutoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Produto $produto) {
        try {
            $sql = "INSERT INTO produto (nome, valor, categoria_id) VALUES (:nome, :valor, :categoria_id)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":valor", $produto->getValor());
            $p->bindValue(":categoria_id", $produto->getCategoriaid());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }  

    public function alterar(Produto $produto) {
        try {
            $sql = "UPDATE produto SET nome = :nome, valor = :valor, categoria_id = :categoria_id
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":valor", $produto->getValor());
            $p->bindValue(":categoria_id", $produto->getCategoriaid());
            $p->bindValue(":id", $produto->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    
    public function excluir($id) {
        try {
            $sql = "DELETE FROM produto WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }    

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM produto";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM produto WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}