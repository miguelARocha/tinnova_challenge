<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupProject extends Command
{
    protected $signature = 'app:setup';
    protected $description = 'Executa a configuração inicial do projeto Laravel';


    public function handle()
    {
        $this->info('🔧 Iniciando configuração do projeto...');
        passthru('npm install');
        file_put_contents(base_path('database/database.sqlite'), '');
        $this->info('⚙️  Criando arquivo .env...');
        copy(base_path('.env.example'), base_path('.env'));
        

        $this->runArtisanCommand('key:generate', 'Gerando chave da aplicação');

        $this->call('migrate'); // Migrações
        $this->call('db:seed'); // Seeders
        
        $this->runArtisanCommand('storage:link', 'Criando link simbólico para o storage');

        $this->runArtisanCommand('config:clear', 'Limpando cache de configuração');
        $this->runArtisanCommand('config:cache', 'Gerando cache de configuração');

        $this->info('✅ Configuração concluída com sucesso!');

        if ($this->confirm('Deseja iniciar o servidor de desenvolvimento agora?', false)) {
            $this->info('🚀 Iniciando servidor em http://127.0.0.1:8000 ...');
            passthru('php artisan serve');
        }
    }
    /**
     * Executa um comando Artisan e exibe mensagens apropriadas.
     *
     * @param string $command O comando Artisan a ser executado.'
     */
    protected function runArtisanCommand(string $command, string $mensagem): void
    {
        $this->info("➡️  $mensagem...");
        $codigo = Artisan::call($command);

        if ($codigo !== 0) {
            $this->error("❌ O comando '{$command}' falhou com código de saída {$codigo}.");
        }
    }
}
