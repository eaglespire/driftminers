<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSetting extends Model
{
    use HasFactory;
    protected $table = 'client_settings';
    protected $fillable = ['user_id','wallet_address'];
}
