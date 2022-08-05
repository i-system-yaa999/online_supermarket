<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comment = Comment::all();
        return back();
    }
    public function create(CommentRequest $request)
    {
        $comment = Comment::Create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);
        return back()->withinput([
            'product_comment_id' => $comment->id,
            'iscomment' => true,
        ]);
    }
    public function update(CommentRequest $request)
    {
        $comment = Comment::find($request->comment_id)->update([
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $comment = Comment::find($request->comment_id)->delete();
        return back();
    }
}
