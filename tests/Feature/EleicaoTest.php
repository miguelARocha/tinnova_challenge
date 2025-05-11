<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Calculos\Eleicao;

class EleicaoTest extends TestCase
{
    /** @test */
    public function retorna_percentuais_corretos_via_api()
    {
        // Configuração
        $expected = [
            'validos' => 80.0,
            'brancos' => 15.0,
            'nulos' => 5.0
        ];

        // Execução
        $response = $this->getJson('/api/eleicao');

        // Verificação
        $response->assertStatus(200)
            ->assertJsonStructure(['validos', 'brancos', 'nulos'])
            ->assertJson($expected);
    }

    /** @test */
    public function calcula_percentuais_corretamente()
    {
        // Configuração
        $eleicao = new Eleicao(
            totalEleitores: 200,
            votosValidos: 100,
            votosBrancos: 50,
            votosNulos: 50
        );

        // Verificação
        $this->assertEquals(50.0, $eleicao->percentualValidos());
        $this->assertEquals(25.0, $eleicao->percentualBrancos());
        $this->assertEquals(25.0, $eleicao->percentualNulos());
    }

    /** @test */
    public function lida_com_total_eleitores_zero()
    {
        // Configuração
        $eleicao = new Eleicao(0, 0, 0, 0);

        // Verificação
        $this->assertEquals(0.0, $eleicao->percentualValidos());
        $this->assertEquals(0.0, $eleicao->percentualBrancos());
        $this->assertEquals(0.0, $eleicao->percentualNulos());
    }
}