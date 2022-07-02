<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derivative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'derivatived_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
