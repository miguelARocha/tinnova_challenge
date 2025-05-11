<?php

namespace Tests\Feature;

use App\Calculos\Eleicao;
use Tests\TestCase;

class EleicaoTest extends TestCase {
    public function test_calcula_percentuais_corretamente() {
        $eleicao = new Eleicao(1000, 800, 150, 50);
        
        $this->assertEquals(80.0, $eleicao->percentualValidos());
        $this->assertEquals(15.0, $eleicao->percentualBrancos());
        $this->assertEquals(5.0, $eleicao->percentualNulos());
    }
}