<?php

namespace Andres\Projeto2\Model\Domain;

class Carro
{
    protected string $nome;
    protected string $marca;
    protected string $modelo;

    public function __construct(string $nome, string $marca, string $modelo)
    {
        $this->setNome($nome);
        $this->setMarca($marca);
        $this->setModelo($modelo);
    }

    private function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    private function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    private function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }
}