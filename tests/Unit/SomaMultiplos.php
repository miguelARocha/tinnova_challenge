<?php

namespace Tests\Unit;

use App\Calculos\SomaMultiplos;
use Tests\TestCase;

class MultiplesSumTest extends TestCase {
    public function test_soma_correta() {
        $this->assertEquals(23, SomaMultiplos::sumMultiples(10)); // Caso clássico
        $this->assertEquals(78, SomaMultiplos::sumMultiples(20)); // Incluindo múltiplos de 15
        $this->assertEquals(0, SomaMultiplos::sumMultiples(2));  // Limite inferior
    }

    public function test_entrada_invalida() {
        $this->expectException(\TypeError::class);
        SomaMultiplos   ::sumMultiples('abc');
    }
}