<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Lucky Onomine',
            'username' => 'Lucky4real',
            'email' => 'luckyonomine@gmail.com',
            'is_admin'=>1,
            'password'=>Hash::make('bestman4thejobistoquit') ,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Shade BestMan',
            'username' => 'IamShadeBestMan',
            'email' => 'dontshademe@gmail.com',
            'is_admin'=>1,
            'password'=>Hash::make('sadelovesmoimoi44') ,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
