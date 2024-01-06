<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\Configuracion;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\Http\Controllers\TuControlador@calculoHoras')->dailyAt('17:09');
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Limpiar usuarios bloqueados después de 2 minutos
            User::where('bloqueado_hasta', '<', now())->update(['intentos_fallidos' => 0, 'bloqueado_hasta' => null]);
        })->everyMinute(); 
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
