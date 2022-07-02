<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre_id',
        'price',
        'description',
        'image',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }


    public function like()
    {
        return $this->hasOne(Like::class);
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
