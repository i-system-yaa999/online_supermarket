<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\History;
use App\Models\Like;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\Facades\DNS2DFacade;
use Illuminate\Support\Carbon;

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'productspage';

        $carts = null;
        $order = null;
        $delivery = null;
        $histories = null;
        $likes = null;
        $qrcode = null;
        $delivery_done= false;
        switch ($request->tab_item) {
            // カートリスト
            case 0:
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                $carts = $order->carts ?? null;
                $delivery = $order->delivery ?? null;
                // $delivery = Delivery::where('user_id', Auth::id())->first();
                break;
            case 1:
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                $carts = $order->carts ?? null;
                $delivery = $order->delivery ?? null;
                // $carts = Cart::all();
                // $delivery = Delivery::where('user_id', Auth::id())->first();
                break;
            case 2:
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                if(isset($order->id)) {
                    $histories = History::where('order_id', $order->id)->get();

                    // QRデータ
                    $history = History::where('order_id', $order->id)->first();
                    if (isset($history)) {
                        $value =
                            'レッドスーパー 購入確認用ＱＲコード' . "\r\n" .
                            '購入日時：' . $history->created_at . "\r\n" .
                            '購入者名：' . Auth::user()->name . "\r\n" .
                            '配達日：' . $order->delivery->date . "\r\n" .
                            '配達便番号：' . $order->delivery->number . "\r\n" .
                            '合計金額：' . Order::total() . '円' . "\r\n";
                        $type = 'QRCODE';
                        $width = 3;
                        $height = 3;
                        $color = 'black';
                        $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);
                    }
                    $delivery_date =  new Carbon($order->delivery->date);
                    if (Carbon::now()->gt($delivery_date)) {
                        // 配達日を過ぎていたらＱＲを消す
                        // $delivery_day < Carbon::now() のとき
                        $delivery_done = true;
                    }
                }

                break;
            case 3:
                $likes = Like::where('user_id', Auth::id())->get();
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        // $carts = Cart::all();
        // $delivery = Delivery::where('user_id', Auth::id())->first();
        // $histories = History::where('user_id', Auth::id())->get();
        return view('mypage')->with([
            'order' => $order,
            'carts' => $carts,
            'tab_item' => $request->tab_item,
            'delivery' => $delivery,
            'delivery_date' => $delivery->date ?? '',
            'delivery_number' => $delivery->number ?? '0',
            'histories' => $histories,
            'likes' => $likes,
            'qrcode' => $qrcode,
            'delivery_done' => $delivery_done,
        ]);
        
    }
    // // 配達予約
    // public function delivery(Request $request){
    //     if(empty(Delivery::where('user_id', Auth::id())->first())){
    //         // 新規予約
    //         Delivery::create([
    //             'user_id' => Auth::id(),
    //             'order_id' => null,
    //             'date' => $request->delivery_date,
    //             'number' => $request->delivery_number,
    //         ]);
    //     }else{
    //         // 予約変更
    //         Delivery::where('user_id', Auth::id())->update([
    //             'date' => $request->delivery_date,
    //             'number' => $request->delivery_number,
    //         ]);
    //     }

    //     $carts = Cart::all();
    //     $delivery = Delivery::where('user_id', Auth::id())->first();
    //     return view('mypage')->with([
    //         'carts' => $carts,
    //         'tab_item' => $request->tab_item,
    //         'delivery' => $delivery,
    //         'delivery_date' => $delivery->date,
    //         'delivery_number' => $delivery->number,
    //     ]);
    // }
}
