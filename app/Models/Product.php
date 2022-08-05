<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'area_id',
        'price',
        'description',
        'image_id',
    ];

    public function getLike()
    {
        $like = Like::where('user_id', Auth::user()->id)->where('product_id', $this->id)->first();
        return $like;
    }

    public function likes_count()
    {
        $likes = Like::where('product_id', $this->id)->get();
        return count($likes);
    }

    public function iscomment()
    {
        $iscomment = Comment::where('user_id', Auth::user()->id)->where('product_id', $this->id)->first();
        return $iscomment;
    }
    // 商品の購入　有/無　判定
    public function purchased()
    {
        $purchased = null;
        $history = History::where('product_id', $this->id)->first();
        if($history){
            $purchased = $history->order->where('user_id', Auth::id())->first();
        }
        return $purchased;
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class);
    }


    public function like()
    {
        return $this->hasOne(Like::class);
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function history()
    {
        return $this->hasOne(History::class);
    }
}
