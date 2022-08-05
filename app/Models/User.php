<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'track_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeAdmins($query)
    {
        return $query->where('is_admin',true);
    }
    public function scopeClients($query)
    {
       return $query->where('is_admin',false);
    }
    public function scopeGetUserById($query,$id)
    {
        return $query->where('id',$id);
    }

    public function subscriber()
    {
        return $this->hasOne(Subscriber::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function histories()
    {
        return $this->hasMany(TransactionHistory::class);
    }
    public function withdrawal()
    {
        return $this->hasOne(Withdrawal::class);
    }
    public function miningDates()
    {
        return $this->hasMany(MiningDate::class);
    }
    public function btcAddress()
    {
        return $this->hasOne(BtcAddress::class);
    }
}
