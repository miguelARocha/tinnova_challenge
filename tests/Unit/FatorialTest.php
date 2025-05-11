<?php

namespace Tests\Unit;

use App\Calculators\FatorialCalculator;
use Tests\TestCase;

class FatorialTest extends TestCase {
    public function test_fatorial_calculos_corretos() {
        $this->assertEquals(1, FatorialCalculator::calculate(0));
        $this->assertEquals(1, FatorialCalculator::calculate(1));
        $this->assertEquals(120, FatorialCalculator::calculate(5));
        $this->assertEquals(720, FatorialCalculator::calculate(6));
    }

    public function test_fatorial_grande() {
        $this->assertEquals(3628800, FatorialCalculator::calculate(10)); // 10! = 3.628.800 (int)
        $this->assertEquals(INF, FatorialCalculator::calculate(100)); // Overflow retorna INF
    }

    public function test_excecao_para_negativos() {
        $this->expectException(\InvalidArgumentException::class);
        FatorialCalculator::calculate(-3);
    }
}