<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'derivative_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function derivative()
    {
        return $this->belongsTo(Derivative::class);
    }
}
