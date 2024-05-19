<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Carro;

class CarroDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Carro $carro) {
        try {
            $sql = "INSERT INTO carro (nome, marca, ano) VALUES (:nome, :marca, :ano)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $carro->getNome());
            $p->bindValue(":marca", $carro->getMarca());
            $p->bindValue(":ano", $carro->getAno());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }  

    public function alterar(Carro $carro) {
        try {
            $sql = "UPDATE carro SET nome = :nome, marca = :marca, ano = :ano
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $carro->getNome());
            $p->bindValue(":marca", $carro->getMarca());
            $p->bindValue(":ano", $carro->getAno());
            $p->bindValue(":id", $carro->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }
    
    public function excluir($id) {
        try {
            $sql = "DELETE FROM carro WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }    

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM carro";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM carro WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}
