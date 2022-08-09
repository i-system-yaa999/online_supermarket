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
    public function cartList()
    {
        $carts = Cart::all();
        $tab_item= 0;
        return view('mypage')->with([
            'carts' => $carts,
            'tab_item' => $tab_item,
        ]);
    }

    // カートに追加
    public function addToCart(Request $request)
    {
        if(Cart::where('product_id',$request->product_id)->first()){
            Cart::where('product_id', $request->product_id)->increment('quantity', $request->quantity);
        }else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('cart.list');
    }

    // カート内商品 個数変更
    public function updateCart(Request $request)
    {
        Cart::find($request->id)->update([
            'quantity' => $request->quantity,
        ]);
        
        return redirect()->route('cart.list');
    }

    // カート内商品 個別削除
    public function removeCart(Request $request)
    {
        Cart::find($request->id)->delete();
        return redirect()->route('cart.list');
    }

    // カート内商品 全削除
    public function clearAllCart()
    {
        Cart::where('user_id', Auth::id())->delete();
        Delivery::where('user_id',Auth::id())->delete();
        return redirect()->route('cart.list');
    }
}
