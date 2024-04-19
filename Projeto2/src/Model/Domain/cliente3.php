<?php

namespace Andres\Projeto2\Model\Domain;

class Cliente3
{
    protected string $nome;
    protected float $valor;
    protected int $numeroConta;

    public function __construct(string $nome, float $valor, int $numeroConta)
    {
        $this->setNome($nome);
        $this->setEndereco($endereco);
        $this->setNumeroConta($numeroConta);
    }

    private function setNumeroConta(int $numeroConta): void
    {
        $this->numeroConta = $numeroConta;
    }

    private function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    private function setEndereco(string $endereco): void
    {
        $this->$endereco = $endereco;
    }

    public function getNumeroConta(): int
    {
        return $this->numeroConta;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEndereo(): string
    {
        return $this->endereco;
    }
}