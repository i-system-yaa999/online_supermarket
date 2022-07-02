<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //追記
use App\Mail\SendMail; //追記

class SendMailController extends Controller
{
    // 送信ボタン押下時に呼ばれる
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
