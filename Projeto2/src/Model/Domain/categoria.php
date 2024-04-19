<?php

namespace Andres\Model\Domain;

class Categoria
{
    private int $id;
    private string $descricao;

    public function __construct(int $id, string $descricao)
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getDescricao(): int
    {
        return $this->descricao;
    }
    public function setDescricao(int $descricao): void
    {
        $this->id = $id;
    }
}
