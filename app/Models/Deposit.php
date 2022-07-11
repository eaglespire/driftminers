<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id','user_id','amount','deposit_is_confirmed'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGetSingleDeposit($query,$id)
    {
        return $query->with(['user','plan'])->where('id',$id);
    }
}
