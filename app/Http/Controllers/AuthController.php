<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('/auth/register');
    }
    public function login(Request $request)
    {
        return view('/auth/login');
    }
    public function logout(Request $request)
    {
        return view('/auth/logout');
    }
    public function email_notice(Request $request)
    {
        return view('/auth/verify-email')->with([
            'title' => '登録確認メールを確認してください。',
        ]);
    }
    public function email_verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return view('/auth/verifired');
    }
    public function email_send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return view('/auth/verify-email')->with([
            'title' => '再度、確認メールを送信しました。',
        ]);
    }
}
