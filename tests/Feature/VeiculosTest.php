<?php

namespace Tests\Feature;

use App\Models\Veiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VeiculosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cria_veiculo_com_sucesso()
    {
        $response = $this->postJson('/api/veiculos', [
            'veiculo' => 'Gol',
            'marca' => 'Volkswagen',
            'ano' => 2020,
            'descricao' => 'Carro popular'
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('veiculo', 'Gol')
            ->assertJsonPath('vendido', false); 
    }

    /** @test */
    public function valida_campos_obrigatorios()
    {
        $response = $this->postJson('/api/veiculos', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'veiculo', 'marca', 'ano', 'descricao'
            ]);
    }

    /** @test */
    public function lista_todos_veiculos()
    {
        Veiculo::factory()->count(3)->create();

        $response = $this->getJson('/api/veiculos');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function mostra_veiculo_especifico()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->getJson("/api/veiculos/{$veiculo->id}");

        $response->assertStatus(200)
            ->assertJsonPath('id', $veiculo->id);
    }

    /** @test */
    public function atualiza_veiculo_completo()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->putJson("/api/veiculos/{$veiculo->id}", [
            'veiculo' => 'Novo Modelo',
            'marca' => 'Ford',
            'ano' => 2022,
            'descricao' => 'Descrição atualizada',
            'vendido' => true
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('veiculo', 'Novo Modelo')
            ->assertJsonPath('vendido', true);
    }

    /** @test */
    public function exclui_veiculo_permanentemente()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->deleteJson("/api/veiculos/{$veiculo->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('veiculos', ['id' => $veiculo->id]);
    }

    /** @test */
    public function relatorio_nao_vendidos()
    {
        Veiculo::factory()->count(5)->create(['vendido' => false]);
        Veiculo::factory()->count(3)->create(['vendido' => true]);

        $response = $this->getJson('/api/veiculos/relatorios/nao-vendidos');

        $response->assertStatus(200)
            ->assertJson(['count' => 5]);
    }

    /** @test */
    public function relatorio_por_decada()
    {
        Veiculo::factory()->create(['ano' => 1995]);
        Veiculo::factory()->create(['ano' => 1998]);
        Veiculo::factory()->create(['ano' => 2005]);

        $response = $this->getJson('/api/veiculos/relatorios/por-decada');

        $response->assertStatus(200)
            ->assertJsonFragment(['decada' => 1990, 'total' => 2])
            ->assertJsonFragment(['decada' => 2000, 'total' => 1]);
    }

    /** @test */
    public function relatorio_ultima_semana()
    {
        Veiculo::factory()->create(['created_at' => now()->subDays(3)]);
        Veiculo::factory()->create(['created_at' => now()->subDays(8)]);

        $response = $this->getJson('/api/veiculos/relatorios/ultima-semana');

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }
}