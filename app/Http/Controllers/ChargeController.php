<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\History;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ChargeController extends Controller
{
    // 決済処理
    public function charge(Request $request)
    {
        try {
            // 決済
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->total,
                'currency' => 'jpy'
            ));

            // 前回分は消去
            // History::where('user_id',Auth::id())->delete();

            // 今回購入分
            $order = Order::create([
                'user_id' => Auth::id(),
                'number' => intval(Carbon::now()->format('siHdmy')),
            ]);
            $delivery = Delivery::find($request->delivery_id);
            $delivery->update([
                'order_id' => $order->id,
            ]);
            $delivery->save;
            $carts = Cart::where('user_id', Auth::id())->get();
            foreach($carts as $cart){
                History::create([
                    'product_id' => $cart->product_id,
                    'order_id' => $order->id,
                    'quantity' => $cart->quantity,
                    'subtotal' => $cart->subtotal(),
                    'delivery_date' => $delivery->date,
                    'delivery_number' => $delivery->number,
                ]);
            }

            // カート内データ削除
            Cart::where('user_id', Auth::id())->delete();

            // 購入内容の控えをメール送信
            $name = $order->user->name;
            $to = $order->user->email;
            $to = 'ufkq56586@mineo.jp';
            $subject = 'ご購入完了のお知らせ';
            $view = 'emails.mail_thanks';
            Mail::to($to)->send(new SendMail($name, $subject, $view, $delivery->number));

            return view('emails.mail_thanks')->with([
                'name' => Auth::user()->name,
                'number' => $delivery->number,
                'histories' => History::where('order_id', $order->id)->get(),
            ]);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
