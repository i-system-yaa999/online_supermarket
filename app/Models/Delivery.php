<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'order_id',
        'date',
        'number',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
