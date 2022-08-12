<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'paid_at',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function histories()
    {
        return $this->hasMany(History::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }


    public static function total($index)
    {
        $total = 0;
        $order = Order::where('user_id', Auth::id())->skip($index)->orderBy('created_at', 'desc')->first();
        foreach ($order->histories as $history) {
            $total += $history->subtotal;
        }
        return $total;
    }
}
