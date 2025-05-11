<?php

namespace Database\Factories;


use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;



class VeiculoFactory extends Factory
{
    protected $model = Veiculo::class;

    public function definition()
    {
        return [
            'veiculo' => $this->faker->word,
            'marca' => $this->faker->randomElement(Veiculo::marcasValidas()),
            'ano' => $this->faker->numberBetween(1900, date('Y') + 1),
            'descricao' => $this->faker->sentence,
            'vendido' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}