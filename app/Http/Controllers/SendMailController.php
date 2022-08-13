<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function sendMail(EmailRequest $request)
    {
        $to = $request->user_email;
        $name = $request->user_name;
        $subject = $request->mail_title;
        $text = $request->mail_message;
        $view = 'emails.mail_contact';
        
        Mail::to($to)->send(new SendMail($name, $subject, $view, $text));
        return back();
    }
}
