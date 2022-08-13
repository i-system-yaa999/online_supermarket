<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'image_url',
        'quantity',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public static function price($id)
    {
        $price = 0;
        $history = History::find($id);
        $price = $history->subtotal / $history->quantity;
        return $price;
    }
}
