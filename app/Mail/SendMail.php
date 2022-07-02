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
    public function __construct(string $name, string $subject)
    {
        //
        $this->name = $name;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            // ->to('takaya@ics-mail.info')  // 送信先アドレス
            ->subject($this->subject)  // 件名
            ->view('mail.contactmail')  // 本文
            ->with(['name' => $this->name]);  // 本文に送る値
    }
}
