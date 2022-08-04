<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    // public static function total()
    // {
    //     $total = 0;
    //     foreach (History::where('user_id', Auth::id())->get() as $history) {
    //         $total += $history->subtotal;
    //     }
    //     return $total;
    // }
    public static function price($id)
    {
        $price = 0;
        $history = History::find($id);
        $price = $history->subtotal / $history->quantity;
        return $price;
    }
}
