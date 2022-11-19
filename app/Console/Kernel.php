<?php

namespace App\Console;

use App\Mail\Notification;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Mail;

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
        $schedule->call(function () {
            $users = User::all();

            foreach ($users as $user) {
                if (strtotime('+' . $user->package->active_period . 'months', strtotime($user->payment_at->toDateTimeString())) - time() <= 60 * 60 * 24 * 7) {
                    Mail::to($user->email)->send(new Notification($user->name));
                }
            }
        })->everyMinute();
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
