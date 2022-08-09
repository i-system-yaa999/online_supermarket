<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeliveryRequest;
use App\Models\Cart;
use App\Models\Delivery;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $delivery = Delivery::all();
        return back();
    }
    public function create(DeliveryRequest $request)
    {
        $delivery = Delivery::create([
            'user_id' => $request->delivery_user_id,
            'order_id' => null,
            'date' => $request->delivery_date,
            'number' => $request->delivery_number,
        ]);
        return back();
    }
    public function update(Request $request)
    {
        $delivery = Delivery::find($request->delivery_id)->update([
            'user_id' => $request->delivery_user_id,
            'order_id' => $request->delivery_order_id,
            'date' => $request->delivery_date,
            'number' => $request->delivery_number,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $delivery = Delivery::find($request->delivery_id)->delete();
        return back();
    }

    public function delivery(Request $request)
    {
        if (empty(Delivery::where('order_id', $request->order_id)->first())) {
            // 新規予約
            $delivery = Delivery::create([
                // 'user_id' => Auth::id(),
                'order_id' => $request->order_id,
                'date' => $request->delivery_date,
                'number' => $request->delivery_number,
            ]);
        } else {
            // 予約変更
            $delivery = Delivery::where('order_id', $request->order_id)->update([
                'date' => $request->delivery_date,
                'number' => $request->delivery_number,
            ]);
        }

        $carts = Cart::all();
        // return back();
        return redirect(route('mypage.index'));
        // return back()->withinput()->with([
        //     'carts' => $carts,
        //     // 'tab_item' => $request->tab_item,
        //     'tab_item' => 0,
        //     'delivery' => $delivery,
        //     // 'delivery_date' => $delivery->date,
        //     // 'delivery_number' => $delivery->number,
        // ]);
    }
}
