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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function histories()
    {
        return $this->hasMany(History::class);
    }
    // public function deliveries()
    // {
    //     return $this->hasMany(Delivery::class);
    // }
    // public function history()
    // {
    //     return $this->hasOne(History::class);
    // }
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }


    public static function total()
    {
        $total = 0;
        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        foreach ($order->histories as $history) {
            $total += $history->subtotal;
        }
        return $total;
    }
}
