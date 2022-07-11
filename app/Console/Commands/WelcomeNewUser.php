<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WelcomeMessageNotification;
use Illuminate\Console\Command;

class WelcomeNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email to welcome new users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();
        foreach ($users as $user){
            $user->notify(new WelcomeMessageNotification());
        }
    }
}
