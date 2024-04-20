<?php

namespace Andres\Projeto2\Model\Domain;

class Aluno
{
    protected string $nome;
    protected string $endereco;
    protected string $telefone;

    public function __construct(string $nome, string $endereco, string $telefone)
    {
        $this->setNome($nome);
        $this->setEndereco($endereco);
        $this->setTelefone($telefone);
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    private function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    private function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }
}