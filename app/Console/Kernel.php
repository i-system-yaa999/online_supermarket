<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Delivery;
use Carbon\Carbon;

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
        // 配達予定時間のお知らせ
        $schedule->call(function () {
            
            $deliveries = Delivery::all();
            $subject = '配達予定時間のお知らせ';
            $view = 'emails.mail_delivery_confirm';

            foreach($deliveries as $delivery)
            {
                $name = $delivery->user->name;
                $to = $delivery->user->email;
                $date = new Carbon($delivery->date);
                
                if($date->isSameDay(Carbon::now())) {
                    Mail::to($to)->send(new SendMail($name, $subject, $view, $delivery->number));
                }
                
            }
            
        // })->everyMinute();
        })->dailyAt('9:00');
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
