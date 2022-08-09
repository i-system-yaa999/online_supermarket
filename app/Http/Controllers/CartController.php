<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // カートリスト
    // public function cartList()
    // {
    //     $carts = Cart::all();
    //     $tab_item= 0;
    //     return view('mypage')->with([
    //         'carts' => $carts,
    //         'tab_item' => $tab_item,
    //     ]);
    // }

    // カートに追加
    public function addToCart(Request $request)
    {
        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        // 支払い済みの場合はカート新規作成
        if(empty($order) || $order->paid_at){
            $order = Order::create([
                'user_id' => Auth::id(),
                'number' => intval(Carbon::now()->format('siHdmy')),
                'paid_at' => null,
                'completed_at' => null,
            ]);
            Cart::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        // 支払い前のときはカートに追加
        }else {
            // カート内に同じ商品があれば追加
            if (Cart::where('product_id', $request->product_id)->first()) {
                Cart::where('product_id', $request->product_id)->increment('quantity', $request->quantity);
            // カート内に同じ商品がなければ新規作成
            } else {
                Cart::create([
                    'order_id' => $order->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }
        }
        return redirect()->route('mypage.index');
    }

    // カート内商品 個数変更
    public function updateCart(Request $request)
    {
        Cart::find($request->id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('mypage.index');
    }

    // カート内商品 個別削除
    public function removeCart(Request $request)
    {
        Cart::find($request->id)->delete();
        $carts = Cart::where('order_id', $request->order_id)->get();
        // カート内が空になったら予約とオーダー番号も削除
        if(count($carts) <= 0){
            Delivery::where('order_id', $request->order_id)->delete();
            Order::find($request->order_id)->delete();
        }
        return redirect()->route('mypage.index');
    }

    // カート内商品 全削除
    public function clearAllCart(Request $request)
    {
        Cart::where('order_id', $request->order_id)->delete();
        Delivery::where('order_id', $request->order_id)->delete();
        Order::find($request->order_id)->delete();
        return redirect()->route('mypage.index');
    }
}
