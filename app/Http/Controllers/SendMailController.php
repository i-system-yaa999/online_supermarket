<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
        // $name = $request->name;
        $name='testtest';
        $to = 'takaya@ics-mail.info';
        $subject = '登録完了しました。';

        Mail::to($to)->send(new SendMail($name, $subject));
        // return view('maildone', ['name' => $name]);
        return 'メール送信完了';
    }
}