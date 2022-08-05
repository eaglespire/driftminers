<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'amount',
        'cryptocurrency_type',
        'wallet_address',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function subscriber()
//    {
//        return $this->BelongsTo(Subscriber::class);
//    }




}
