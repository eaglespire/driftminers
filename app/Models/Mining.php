<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mining extends Model
{
    use HasFactory;
    protected $fillable = [
        'profit','user_id','plan_id',
    ];
}
