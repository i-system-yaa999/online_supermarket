<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Order;
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
            
            $orders = Order::all();
            $subject = '配達予定時間のお知らせ';
            $view = 'emails.mail_delivery_confirm';

            foreach($orders as $order)
            {
                if(isset($order->paid_at)){
                    $name = $order->user->name;
                    $to = $order->user->email;
                    $text = $order->delivery->number;
                    $text = "$text";

                    $date = new Carbon($order->delivery->date);
                    if ($date->isSameDay(Carbon::now())) {
                        Mail::to($to)->send(new SendMail($name, $subject, $view, $text));
                    }
                }
                
            }
            
        // })->everyMinute();// 確認時はこちらを有効にする
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
