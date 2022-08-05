<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $dates = ['last_mining_date'];

    protected $fillable = [
        'user_id',
//        'plan_id',
        'balance',
        'last_mining_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function miningDates()
    {
        return $this->hasMany(MiningDate::class);
    }
    public function scopeFindPlan($query, $id)
    {
        return $query->where('id', $id);
    }
}
