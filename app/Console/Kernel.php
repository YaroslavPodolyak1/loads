<?php

namespace App\Console;

use App\Console\Commands\CreateLoadCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        $createLoadCount = 1;

        $schedule
            ->command(CreateLoadCommand::class, [$createLoadCount])
            ->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
