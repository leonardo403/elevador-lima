<?php
namespace App\DTOs;

class ChamarElevadorDTO
{
    public function __construct(public readonly int $andar) {}
}
