<?php
namespace App\Repositories;

use App\Models\ElevadorLog;

class ElevadorRepository
{
    public function salvar(int $andar, string $mensagem): void
    {
        ElevadorLog::create([
            'andar' => $andar,
            'mensagem' => $mensagem
        ]);
    }
}
