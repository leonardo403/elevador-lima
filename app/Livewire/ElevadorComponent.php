<?php

namespace App\Livewire;

use Livewire\Component;
use App\DTOs\ChamarElevadorDTO;
use App\Services\ElevadorService;

class ElevadorComponent extends Component
{
    public int $andar = 0;
    public string $mensagem = '';

    public function chamarElevador(ElevadorService $service)
    {
        try {
            $dto = new ChamarElevadorDTO($this->andar);
            $service->chamarElevador($dto);
            $this->mensagem = "Elevador chamado para o andar {$this->andar}.";
        } catch (\Exception $e) {
            $this->mensagem = $e->getMessage();
        }
    }

    public function moverElevador(ElevadorService $service)
    {
        $this->mensagem = $service->processarMovimento();
    }

    public function render(ElevadorService $service)
    {
        return view('livewire.elevador-component', [
            'andarAtual' => $this->andar,
            'pendentes' => $service->getChamadosPendentes()
        ]);
    }
}
