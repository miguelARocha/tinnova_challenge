<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Registre os comandos Artisan do projeto.
     */
    protected $commands = [
        \App\Console\Commands\SetupProject::class, // Adicione seu comando aqui
    ];

    /**
     * Defina o agendamento de tarefas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Opcional: Configure tarefas agendadas se necessário
    }

    /**
     * Registre comandos para a aplicação.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}