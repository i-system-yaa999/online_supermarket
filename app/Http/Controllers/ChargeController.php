<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

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

            // 購入履歴書き込み
            $delivery = Delivery::where('user_id', Auth::id())->first();
            // 前回分は消去
            History::where('user_id',Auth::id())->delete();
            // 今回購入分
            $carts = Cart::where('user_id', Auth::id())->get();
            foreach($carts as $cart){
                History::create([
                    'product_id' => $cart->product_id,
                    'user_id' => Auth::id(),
                    'quantity' => $cart->quantity,
                    'subtotal' => $cart->subtotal(),
                ]);
            }

            // カート内データ削除
            Cart::where('user_id', Auth::id())->delete();

            // 配達予約データ削除
            Delivery::where('user_id', Auth::id())->delete();
            
            // 購入内容の控えをメール送信する処理をここに入れる

            return view('thanks');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
