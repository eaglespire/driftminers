<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiningDate extends Model
{
    use HasFactory;
//    protected $dates = ['mining_date'];
    protected $table = 'mining_dates';

    protected $fillable = ['wallet_id','mining_date_value','user_id'];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
