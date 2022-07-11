<?php

namespace App\Jobs;

use App\Helpers\UserHelpers;
use App\Mail\NewDepositMail;
use App\Mail\NewDepositMailForAdmin;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewDepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;
    protected array $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,array $data)
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
            Mail::to($admin)->send(new NewDepositMailForAdmin($this->data));
        }
        //Notify the user who made a deposit
        Mail::to($this->user)->send(new NewDepositMail($this->data));
    }
}
