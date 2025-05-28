<?php
namespace App\Support;

use SplQueue;

class Elevador
{
    private SplQueue $filaChamados;
    private int $andarAtual;
    private int $capacidade;

    public function __construct(int $capacidade)
    {
        $this->capacidade = $capacidade;
        $this->filaChamados = new SplQueue();
        $this->andarAtual = 0;
    }

    public function chamar(int $andar): void
    {
        if ($andar < 0) throw new \InvalidArgumentException("Andar inválido.");
        $this->filaChamados->enqueue($andar);
    }

    public function mover(): ?int
    {
        if ($this->filaChamados->isEmpty()) return null;
        $proximoAndar = $this->filaChamados->dequeue();
        $this->andarAtual = $proximoAndar;
        return $proximoAndar;
    }

    public function getAndarAtual(): int
    {
        return $this->andarAtual;
    }

    public function getChamadosPendentes(): SplQueue
    {
        return clone $this->filaChamados;
    }
}
