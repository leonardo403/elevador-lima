<?php

namespace App\Services;

use App\DTOs\ChamarElevadorDTO;
use App\Repositories\ElevadorRepository;
use App\Support\Elevador;

class ElevadorService
{
    private Elevador $elevador;

    public function __construct(
        protected ElevadorRepository $repository
    ) {
        $this->elevador = new Elevador(5);
    }

    public function chamarElevador(ChamarElevadorDTO $dto): void
    {
        $this->elevador->chamar($dto->andar);
        if ($dto->andar < 0) {
            throw new \InvalidArgumentException("Andar inválido: {$dto->andar}");
        }
        if ($this->elevador->getChamadosPendentes()->count() > 5) {
            throw new \RuntimeException("Capacidade máxima de chamados atingida.");
        }
        if ($this->elevador->getAndarAtual() === $dto->andar) {
            throw new \RuntimeException("Elevador já está no andar {$dto->andar}.");
        }
        $this->repository->salvar($dto->andar, "Chamado registrado para o andar {$dto->andar}");
    }

    public function processarMovimento(): ?string
    {
        $proximoAndar = $this->elevador->mover();
        if ($proximoAndar === null) return "Sem chamados pendentes.";

        $mensagem = "Movendo para o andar {$proximoAndar}.";
        $this->repository->salvar($proximoAndar, $mensagem);
        return $mensagem;
    }

    public function getAndarAtual(): int
    {
        return $this->elevador->getAndarAtual();
    }

    public function getChamadosPendentes(): array
    {
        return iterator_to_array($this->elevador->getChamadosPendentes());
    }
}
