<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Empresa;

class EmpresaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Empresa $empresa) {
        try {
            $sql = "INSERT INTO empresa (nome_fantasia, cnpj, receita) VALUES (:nome_fantasia, :cnpj, :receita)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome_fantasia", $empresa->getNomeFantasia());
            $p->bindValue(":cnpj", $empresa->getCnpj());
            $p->bindValue(":receita", $empresa->getReceita());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }  

    public function alterar(Empresa $empresa) {
        try {
            $sql = "UPDATE empresa SET nome_fantasia = :nome_fantasia, cnpj = :cnpj, receita = :receita WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome_fantasia", $empresa->getNomeFantasia());
            $p->bindValue(":cnpj", $empresa->getCnpj());
            $p->bindValue(":receita", $empresa->getReceita());
            $p->bindValue(":id", $empresa->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }
    
    public function excluir($id) {
        try {
            $sql = "DELETE FROM empresa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }    

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM empresa";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return false;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM empresa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return false;
        }
    }
}
