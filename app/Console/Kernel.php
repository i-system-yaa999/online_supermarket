<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\History;
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
            
            $histories = History::all();
            $subject = '配達予定時間のお知らせ';
            $view = 'emails.mail_delivery_confirm';

            foreach($histories as $history)
            {
                $name = $history->order->user->name;
                $to = $history->order->user->email;
                // $to = 'ufkq56586@mineo.jp';
                $date = new Carbon($history->order->delivery->date);
                
                if($date->isSameDay(Carbon::now())) {
                    Mail::to($to)->send(new SendMail($name, $subject, $view, $history->order->delivery->number));
                }
                
            }
            
        // })->everyMinute();
        })->dailyAt('8:00');
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
