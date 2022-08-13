<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $like = Like::all();
        return back();
    }
    public function create(Request $request)
    {
        $like = Like::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
        ]);
        return back();
    }
    public function update(Request $request)
    {
        $like = Like::find($request->like_id)->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $like = Like::where('user_id', $request->user_id)->where('product_id', $request->product_id)->delete();

        return back();
    }
}
