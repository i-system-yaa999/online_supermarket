<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
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
    public function __construct(string $name, string $subject, string $view, string $text)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->view = $view;
        $this->text = $text;
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
            ->with([
                'name' => $this->name,
                'text' => $this->text,
            ]);
    }
}
