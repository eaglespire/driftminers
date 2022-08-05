<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BtcAddress extends Model
{
    use HasFactory;
    protected $table = 'btc_addresses';
    protected $fillable = [
        'user_id',
        'address'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
