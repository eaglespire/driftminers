<?php

namespace App\Jobs;

use App\Mail\SubscriptionActivatedMail;
use App\Mail\SubscriptionActivatedMailAdmins;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SubscriptionActivationJob implements ShouldQueue
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
        //Send mail to the user
        Mail::to($this->user)->send(new SubscriptionActivatedMail($this->data));
        /*
         * Send to the admins
         */
        $admins = User::admins();
        foreach ($admins as $admin){
            Mail::to($admin)->send(new SubscriptionActivatedMailAdmins($this->data));
        }
    }
}
