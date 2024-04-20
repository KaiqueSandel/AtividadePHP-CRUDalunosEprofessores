<?php

namespace Andres\Model\Dao;

use PDO;

class DAO
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = new PDO("mysql:host=localhost; dbname=projeto_php", "root", "");
    }
    /**
     * @return mixed
     */
    public function getConexao()
    {
        return $this->conexao;
    }
}