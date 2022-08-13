<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\Facades\DNS2DFacade;

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
        $history_index = 0;
        switch ($request->tab_item) {
            // カートリスト
            case 0:
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                $carts = $order->carts ?? null;
                $delivery = $order->delivery ?? null;
                break;
            case 1:
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                $carts = $order->carts ?? null;
                $delivery = $order->delivery ?? null;
                break;
            case 2:
                // カートに商品がある場合は最新のオーダーではなく２番目を取得する
                $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
                if(empty($order->paid_at)){
                    $history_index = 1;
                    $order = Order::where('user_id', Auth::id())->skip($history_index)->orderBy('created_at', 'desc')->first();
                }
                if(isset($order->id)) {
                    $histories = $order->histories;

                    // QRデータ
                    $value =
                        'レッドスーパー 購入確認用ＱＲコード' . "\r\n" .
                        '注文番号：' . $order->number . "\r\n" .
                        '購入日時：' . $order->created_at . "\r\n" .
                        '購入者名：' . Auth::user()->name . "\r\n" .
                        '配達日：' . $order->delivery->date . "\r\n" .
                        '配達便番号：' . $order->delivery->number . "\r\n" .
                        '合計金額：' . Order::total($history_index) . '円' . "\r\n";
                    $type = 'QRCODE';
                    $width = 3;
                    $height = 3;
                    $color = 'black';
                    $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);

                }

                break;
            case 3:
                $likes = Like::where('user_id', Auth::id())->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        return view('mypage')->with([
            'tab_item' => $request->tab_item,
            'order' => $order,
            'carts' => $carts,
            'delivery' => $delivery,
            'histories' => $histories,
            'history_index' => $history_index,
            'qrcode' => $qrcode,
            'likes' => $likes,
        ]);
        
    }
}
