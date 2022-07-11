<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'roi',
        'name',
        'description',
        'minimum_investment',
        'duration',
    ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function scopeGetPlanById($query,$id)
    {
        return $query->where('id', $id);
    }

}
