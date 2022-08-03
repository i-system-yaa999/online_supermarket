<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $subject, string $view, int $number)
    {
        //
        $this->name = $name;
        $this->subject = $subject;
        $this->view = $view;
        $this->number = $number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)  // 件名
            ->view($this->view)  // 本文
            ->with(['name' => $this->name])  // 本文に送る値
            ->with(['number' => $this->number]);
    }
}
