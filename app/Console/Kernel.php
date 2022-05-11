<?php

namespace App\Console;

use App\Jobs\DeleteCompletedTodo;
use App\Jobs\OutputRandomValue;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
//         $schedule->command('inspire')->everyMinute();
//        $schedule->command('command:get-value --implementation=random')
//            ->everyMinute();
//        $schedule->job(new OutputRandomValue)->everyMinute();

        // Dispatching OutputRandomValue job 100 times every minute
//        $schedule->call(function () {
//            for($i=0;$i<100;$i++) {
//                OutputRandomValue::dispatch();
//            }
//        })->everyMinute();
        $schedule->job(new DeleteCompletedTodo)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
