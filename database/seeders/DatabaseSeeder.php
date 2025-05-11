<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Veiculo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Criar 10 veículos com dados aleatórios
        Veiculo::factory(10)->create([
            'vendido' => false,
        ]);
        // Criar 5 veículos vendidos
        Veiculo::factory(5)->create([
            'vendido' => true,
        ]);
        // Criar 5 veículos com ano 2023
        Veiculo::factory(5)->create([
            'ano' => 2023,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2022
        Veiculo::factory(5)->create([
            'ano' => 2022,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2021
        Veiculo::factory(5)->create([
            'ano' => 2021,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2020
        Veiculo::factory(5)->create([
            'ano' => 2020,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2019
        Veiculo::factory(5)->create([
            'ano' => 2019,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2018
        Veiculo::factory(5)->create([
            'ano' => 2018,
            'vendido' => false,
        ]);
        // Criar 5 veículos com ano 2017
        Veiculo::factory(5)->create([
            'ano' => 2017,
            'vendido' => false,
        ]);
        // Criar 15 veículos com ano 1960
        Veiculo::factory(15)->create([
            'ano' => 1960,
            'vendido' => false,
        ]);
    }
}
