<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\History;
use App\Models\Like;
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
        $delivery = null;
        $histories = null;
        $likes = null;
        $qrcode = null;
        switch ($request->tab_item) {
            // カートリスト
            case 0:
                $carts = Cart::all();
                break;
            case 1:
                $carts = Cart::all();
                $delivery = Delivery::where('user_id', Auth::id())->first();
                break;
            case 2:
                $histories = History::where('user_id', Auth::id())->get();

                // QRデータ
                $history = History::where('user_id', Auth::id())->first();
                $delivery = Delivery::where('user_id', Auth::id())->first();
                $value =
                    'レッドスーパー 購入確認用ＱＲコード' . "\r\n" .
                    '購入日時：' . $history-> created_at . "\r\n" .
                    '購入者名：' . Auth::user()->name . "\r\n" .
                    '配達便番号：' . $delivery->delivery_number . "\r\n" .
                    '合計金額：' . History::total().'円' . "\r\n" .
                $type = 'QRCODE';
                $width = 3;
                $height = 3;
                $color = 'black';
                $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);
                // $qrcode
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
            'carts' => $carts,
            'tab_item' => $request->tab_item,
            'delivery' => $delivery,
            'delivery_number' => $delivery->delivery_number ?? '9999',
            'histories' => $histories,
            'likes' => $likes,
            'qrcode' => $qrcode,
        ]);
        
    }
    // 配達予約
    public function delivery(Request $request){
        if(empty(Delivery::where('user_id',Auth::id())->first())){
            // 新規予約
            Delivery::create([
                'user_id' => Auth::id(),
                'delivery_number' => $request->delivery_number,
            ]);
        }else{
            // 予約変更
            Delivery::where('user_id', Auth::id())->update([
                'delivery_number' => $request->delivery_number,
            ]);
        }

        $carts = Cart::all();
        $delivery = Delivery::where('user_id', Auth::id())->first();
        return view('mypage')->with([
            'carts' => $carts,
            'tab_item' => $request->tab_item,
            'delivery' => $delivery,
            'delivery_number' => $delivery->delivery_number,
        ]);
    }
}
