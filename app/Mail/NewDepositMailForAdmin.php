<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDepositMailForAdmin extends Mailable
{
    use Queueable, SerializesModels;
     public $userData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->markdown('mail.new-deposit-mail-for-admin', [
//            'depositorName'=>$this->data['depositorName'],
//            'depositorEmail'=>$this->data['depositorEmail'],
//            'amount'=>$this->data['amountDeposited'],
//            'planType'=>$this->data['planType'],
//            'planDuration'=>$this->data['planDuration'],
//            'planRoi'=>$this->data['planRoi'],
//        ]);
        //return $this->markdown('mail.new-deposit-mail-for-admin');
        //return $this->markdown('mail.new-deposit-mail-for-admin');
        $data = [
            'name'=> $this->userData['depositorName'],
        ];
        return $this->markdown('mail.new-deposit-mail-for-admin', $data);
    }
}
