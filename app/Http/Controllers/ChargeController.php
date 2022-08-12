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

            // 支払い完了日
            $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
            $order->update([
                'paid_at' => Carbon::now(),
            ]);
            $order->save();

            $carts = Cart::where('order_id', $order->id)->get();
            foreach($carts as $cart){
                History::create([
                    'name' => $cart->product->name,
                    'image_url' => $cart->product->image->url,
                    'order_id' => $order->id,
                    'quantity' => $cart->quantity,
                    'subtotal' => $cart->subtotal(),
                ]);
            }

            // カート内データ削除
            Cart::where('order_id', $order->id)->delete();

            // 購入内容の控えをメール送信
            $delivery = Delivery::where('order_id', $order->id)->first();

            $name = $order->user->name;
            $to = $order->user->email;
            $subject = "ご注文番号：{{$order->number}}　ご購入完了のお知らせ";
            $text = "$delivery->number";
            $view = 'emails.mail_thanks';
            Mail::to($to)->send(new SendMail($name, $subject, $view, $text));

            return view('emails.mail_thanks')->with([
                'name' => Auth::user()->name,
                'text' => $delivery->number,
            ]);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
