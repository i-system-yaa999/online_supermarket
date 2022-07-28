<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\History;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

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