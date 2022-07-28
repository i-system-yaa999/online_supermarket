<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public static function total()
    {
        $total = 0;
        foreach(Cart::all() as $cart){
            $total += $cart->product->price * $cart->quantity;
        }
        return $total;
    }
    public function subtotal()
    {
        $product = Product::find($this->product_id);
        $subtotal = $product->price * $this->quantity;
        return $subtotal;
    }
}
