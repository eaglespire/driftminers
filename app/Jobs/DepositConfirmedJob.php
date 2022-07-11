<?php

namespace App\Jobs;

use App\Helpers\UserHelpers;
use App\Mail\DepositConfirmed;
use App\Mail\DepositConfirmedAdmin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DepositConfirmedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     protected User $user;
     protected array $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$data)
    {
       $this->user = $user;
       $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admins = UserHelpers::getAdmins();
        foreach ($admins as $admin){
            $admin->notify(new DepositConfirmedAdmin($this->data));
        }
        //notify the user
        $this->user->notify(new DepositConfirmed($this->data));
    }
}
