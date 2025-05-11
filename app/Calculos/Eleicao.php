<?php

namespace App\Calculos;

class Eleicao {
    private $totalEleitores;
    private $votosValidos;
    private $votosBrancos;
    private $votosNulos;

    public function __construct(
        int $totalEleitores,
        int $votosValidos,
        int $votosBrancos,
        int $votosNulos
    ) {
        $this->totalEleitores = $totalEleitores;
        $this->votosValidos = $votosValidos;
        $this->votosBrancos = $votosBrancos;
        $this->votosNulos = $votosNulos;
    }

    public function percentualValidos(): float {
        return ($this->votosValidos / $this->totalEleitores) * 100;
    }

    public function percentualBrancos(): float {
        return ($this->votosBrancos / $this->totalEleitores) * 100;
    }

    public function percentualNulos(): float {
        return ($this->votosNulos / $this->totalEleitores) * 100;
    }
}