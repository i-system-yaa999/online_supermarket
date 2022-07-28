<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        Like::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
        ]);
        // Product::find($product_id)->increment('likes_count');
        return back();
    }
    public function delete(Request $request)
    {
        Like::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->delete();
        // Product::find($product_id)->decrement('likes_count');

        return back();
    }
}
